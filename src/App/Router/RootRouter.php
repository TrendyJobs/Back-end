<?php
namespace App\Router;

use Base\Application;
use Base\Router\RouterInterface;
use Silex\ControllerCollection;

class RootRouter implements RouterInterface
{
    public function load(Application $app)
    {

        $app->get(
            '/',
            function () use ($app) {
                return $app->redirect('/hello/visitor');
            }
        );

        /**
         * @var ControllerCollection $backend
         */
        $backend = $app['controllers_factory'];

        $backend->get('/hello/{name}', 'App\Controller\RootController::helloAction');
        $backend->get('/crawl', 'App\Controller\RootController::crawlAction');
        $backend->get('/apecCrawl', 'App\Controller\RootController::apecCrawlAction');
        $backend->get('/scrap', 'App\Controller\RootController::scrapAction');
        $backend->get('/connect', 'App\Controller\RootController::connectAction');

        $backend->get('/getNbAdvertsByCompany/{limit}', 'App\Controller\RootController::getNbAdvertsByCompanyAction');
        $backend->get('/getNbAdvertsByTechnos/{limit}', 'App\Controller\RootController::getNbAdvertsByTechnosAction');
        $backend->get('/getNbAdvertsCompanyByTechnos/{company}/{limit}', 'App\Controller\RootController::getNbAdvertsCompanyByTechnosAction');
        $backend->get('/getNbAdvertsCompanyByWages/{company}/{min}/{max}/{pad}/{limit}', 'App\Controller\RootController::getNbAdvertsCompanyByWagesAction');
        $backend->get('/getAverageWagesByCompany/{limit}', 'App\Controller\RootController::getAverageWagesByCompanyAction');

        $backend->get('/getJobAdverts/{limit}', 'App\Controller\RootController::getJobAdvertsAction');
        $backend->get('/getJobAdvertsLocated/{limit}', 'App\Controller\RootController::getJobAdvertsLocatedAction');
        $backend->get('/getJobAdvertsWithTechnos/{limit}', 'App\Controller\RootController::getJobAdvertsWithTechnosAction');
        $backend->get('/getStatsEntrepriseTechno/{limit}', 'App\Controller\RootController::getStatsEntrepriseTechnoAction');
        $backend->get('/populateCities', 'App\Controller\RootController::populateCitiesAction');
        $backend->get('/scrapTechnos', 'App\Controller\RootController::scrapTechnosAction');
        $backend->get('/getTechnos', 'App\Controller\RootController::getTechnosAction');

        $app->mount('/backend', $backend);

    }
}
