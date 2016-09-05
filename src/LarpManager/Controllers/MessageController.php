<?php

/**
 * LarpManager - A Live Action Role Playing Manager
 * Copyright (C) 2016 Kevin Polez
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace LarpManager\Controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

use LarpManager\Form\NewMessageForm;
use LarpManager\Entities\User;
use LarpManager\Entities\Message;

/**
 * LarpManager\Controllers\MessageController
 *
 * @author kevin
 *
 */
class MessageController
{


	/**
	 * Nouveau message
	 *
	 * @param Application $app
	 * @param Request $request
	 * @param User $user
	 */
	public function messageNewAction(Application $app, Request $request)
	{
		$message = new Message();
		$message->setUserRelatedByAuteur($app['user']);
	
		$form = $app['form.factory']->createBuilder(new NewMessageForm(), $message)
			->add('envoyer','submit', array('label' => "Envoyer votre message"))
			->getForm();
	
		$form->handleRequest($request);
	
		if ( $form->isValid() )
		{
			$message = $form->getData();
				
			$app['orm.em']->persist($message);
			$app['orm.em']->flush();
				
			// création de la notification
			$destinataire = $message->getUserRelatedByDestinataire();
			$app['notify']->newMessage($destinataire, $message);
				
			$app['session']->getFlashBag()->add('success', 'Votre message a été envoyé.');
			return $app->redirect($app['url_generator']->generate('homepage'),301);
		}
	
		return $app['twig']->render('public/message/new.twig', array(
				'form' => $form->createView(),
		));
	}
	
	/**
	 * Archiver un message
	 *
	 * @param Application $app
	 * @param Request $request
	 * @throws NotFoundHttpException
	 * @throws AccessDeniedException
	 */
	public function messageArchiveAction(Application $app, Request $request, Message $message)
	{
		if ( $message->getUserRelatedByDestinataire() != $app['user'])
		{
			return false;
		}
	
		$message->setLu(true);
		$app['orm.em']->persist($message);
		$app['orm.em']->flush();
	
		return true;
	}
}