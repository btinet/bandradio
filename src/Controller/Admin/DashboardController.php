<?php

namespace App\Controller\Admin;

use App\Entity\ContentType;
use App\Entity\Menu;
use App\Entity\MenuType;
use App\Entity\Page;
use App\Entity\Post;
use App\Entity\Tag;
use App\Entity\Template;
use App\Entity\View;
use App\Entity\ViewType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(PostCrudController::class)->generateUrl());

        //return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Bandradio');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToRoute('Zurück zur Website','fa fa-home','app_index');

        yield MenuItem::section('Inhalte','');
        yield MenuItem::linkToCrud('Ansichten','fas fa-eye',View::class);
        yield MenuItem::linkToCrud('Beiträge','fas fa-file',Post::class);
        yield MenuItem::linkToCrud('Seiten','fas fa-file',Page::class);
        yield MenuItem::linkToCrud('Tags', 'fas fa-tag', Tag::class);
        yield MenuItem::linkToCrud('Menüs','fas fa-bars',Menu::class);

        yield MenuItem::section('Struktur','fas fa-sitemap');
        yield MenuItem::linkToCrud('Ansichtstypen','fas fa-eye',ViewType::class);
        yield MenuItem::linkToCrud('Inhaltstypen','fa fa-list',ContentType::class);
        yield MenuItem::linkToCrud('Menütypen','fas fa-bars',MenuType::class);
        yield MenuItem::linkToCrud('Templates', 'fas fa-file', Template::class);


        yield MenuItem::section('Konfiguration','fas fa-cog');





    }
}
