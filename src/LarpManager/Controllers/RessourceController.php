<?php
namespace LarpManager\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Silex\Application;
use LarpManager\Form\RessourceForm;

/**
 * LarpManager\Controllers\RessourceController
 *
 * @author kevin
 *
 */
class RessourceController
{
	/**
	 * Liste des ressources
	 * 
	 * @param Request $request
	 * @param Application $app
	 */
	public function indexAction(Request $request, Application $app)
	{
		$repo = $app['orm.em']->getRepository('\LarpManager\Entities\Ressource');
		$ressources = $repo->findAll();
		return $app['twig']->render('ressource/index.twig', array('ressources' => $ressources));
	}
	
	/**
	 * Ajout d'une ressource
	 * 
	 * @param Request $request
	 * @param Application $app
	 */
	public function addAction(Request $request, Application $app)
	{
		$ressource = new \LarpManager\Entities\Ressource();
		
		$form = $app['form.factory']->createBuilder(new RessourceForm(), $ressource)
			->add('save','submit', array('label' => "Sauvegarder"))
			->add('save_continue','submit', array('label' => "Sauvegarder & continuer"))
			->getForm();
		
		$form->handleRequest($request);
		
		if ( $form->isValid() )
		{
			$ressource = $form->getData();
		
			$app['orm.em']->persist($ressource);
			$app['orm.em']->flush();
		
			$app['session']->getFlashBag()->add('success', 'La ressource a été ajoutée.');
		
			if ( $form->get('save')->isClicked())
			{
				return $app->redirect($app['url_generator']->generate('ressource'),301);
			}
			else if ( $form->get('save_continue')->isClicked())
			{
				return $app->redirect($app['url_generator']->generate('ressource.add'),301);
			}
		}
		
		return $app['twig']->render('ressource/add.twig', array(
				'form' => $form->createView(),
		));
	}
	
	/**
	 * Mise à jour d'une ressource
	 * 
	 * @param Request $request
	 * @param Application $app
	 */
	public function updateAction(Request $request, Application $app)
	{
		$id = $request->get('index');
		
		$ressource = $app['orm.em']->find('\LarpManager\Entities\Ressource',$id);
		
		$form = $app['form.factory']->createBuilder(new RessourceForm(), $ressource)
			->add('update','submit', array('label' => "Sauvegarder"))
			->add('delete','submit', array('label' => "Supprimer"))
			->getForm();
		
		$form->handleRequest($request);
		
		if ( $form->isValid() )
		{
			$ressource = $form->getData();
		
			if ($form->get('update')->isClicked())
			{
				$app['orm.em']->persist($ressource);
				$app['orm.em']->flush();
				$app['session']->getFlashBag()->add('success', 'La ressource a été mise à jour.');
			}
			else if ($form->get('delete')->isClicked())
			{
				$app['orm.em']->remove($ressource);
				$app['orm.em']->flush();
					
				$app['session']->getFlashBag()->add('success', 'La ressource a été supprimée.');
			}
		
			return $app->redirect($app['url_generator']->generate('ressource'));
		}
				
		return $app['twig']->render('ressource/update.twig', array(
				'ressource' => $ressource,
				'form' => $form->createView(),
		));
	}
	
	/**
	 * Affiche de détail d'une ressource
	 * 
	 * @param Request $request
	 * @param Application $app
	 */
	public function detailAction(Request $request, Application $app)
	{
		$id = $request->get('index');
		
		$ressource = $app['orm.em']->find('\LarpManager\Entities\Ressource',$id);
		
		if ( $ressource )
		{
			return $app['twig']->render('ressource/detail.twig', array('ressource' => $ressource));
		}
		else
		{
			$app['session']->getFlashBag()->add('error', 'La ressource n\'a pas été trouvée.');
			return $app->redirect($app['url_generator']->generate('ressource'));
		}
	}
	
	public function detailExportAction(Request $request, Application $app)
	{
	
	}
	
	public function exportAction(Request $request, Application $app)
	{
	
	}
}