<?php

namespace App\Controller;

use App\Entity\ApiKeys;
use App\Entity\State;
use App\Entity\StateRelation;
use App\Entity\Task;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin/main-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Panel administracyjny');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToUrl('Strona główna', 'fa fa-home', '/');
        // yield MenuItem::linkToDashboard('Dashboard', 'fa fa-dashboard');
        yield MenuItem::linkToCrud('Użytkownicy', 'fa fa-user', User::class);
        yield MenuItem::linkToCrud('Zadania', 'fa fa-calendar', Task::class);
        yield MenuItem::linkToCrud('Statusy zadań', 'fa fa-signal', State::class);
        yield MenuItem::linkToCrud('Kolejność statusów', 'fa fa-sort', StateRelation::class);
        yield MenuItem::linkToCrud('Klucze API', 'fa fa-key', ApiKeys::class);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
