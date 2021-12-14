<?php

namespace App\Controller;

use App\Entity\ContentType;
use App\Entity\Menu;
use App\Entity\Page;
use App\Entity\Post;
use App\Entity\View;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/", name="app_")
 */
class AppController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        $page = $this->getDoctrine()->getRepository(Page::class)->findOneBy([
            'isFrontpage' => true
        ]);
        return $this->redirectToRoute('app_page',['slug' => $page->getSlug()]);
    }

    /**
     * @Route("/page/{slug}", name="page", methods={"GET","HEAD"})
     */
    public function page(string $slug): Response
    {
        $menuRepository = $this->getDoctrine()->getRepository(Menu::class);
        $postRepository = $this->getDoctrine()->getRepository(Post::class);
        $pageRepository = $this->getDoctrine()->getRepository(Page::class);
        $viewRepository = $this->getDoctrine()->getRepository(View::class);
        $contentTypeRepository = $this->getDoctrine()->getRepository(ContentType::class);

        $mainMenu = $menuRepository->findBy(['menuType' => 1],['weight' => 'asc']);
        $legalMenu = $menuRepository->findBy(['menuType' => 2],['weight' => 'asc']);
        $socialMenu = $menuRepository->findBy(['menuType' => 3],['weight' => 'asc']);


        $page = $pageRepository->findOneBy(['slug' => $slug]);

        $contentHeaderPrimary = false;
        if ($page->getBlockHeaderPrimary()){
            $contentHeaderPrimary = $contentTypeRepository->findViews(
                $page->getBlockHeaderPrimary()->getId()
            );
        }

        $contentSidebarPrimary = false;
        if ($page->getBlockSidebarPrimary()){
            $contentSidebarPrimary = $contentTypeRepository->findViews(
                $page->getBlockSidebarPrimary()->getId()
            );
        }
        $contentSidebarSecondary = false;
        if ($page->getBlockSidebarSecondary()){
            $contentSidebarSecondary = $contentTypeRepository->findViews(
                $page->getBlockSidebarSecondary()->getId()
            );
        }
        $contentSidebarTertiary = false;
        if ($page->getBlockSidebarTertiary()){
            $contentSidebarTertiary = $contentTypeRepository->findViews(
                $page->getBlockSidebarTertiary()->getId()
            );
        }

        $contentBodyPrimary = false;
        if ($page->getBlockBodyPrimary()){
            $contentBodyPrimary = $contentTypeRepository->findViews(
                $page->getBlockBodyPrimary()->getId()
            );
        }

        $contentFooterPrimary = false;
        if ($page->getBlockFooterPrimary()){
            $contentFooterPrimary = $contentTypeRepository->findViews(
                $page->getBlockFooterPrimary()->getId()
            );
        }
        $contentFooterSecondary = false;
        if ($page->getBlockFooterSecondary()){
            $contentFooterSecondary = $contentTypeRepository->findViews(
                $page->getBlockFooterSecondary()->getId()
            );
        }


        return $this->render('app/page.html.twig', [
            'main_menu' => $mainMenu,
            'legal_menu' => $legalMenu,
            'social_menu' => $socialMenu,
            'page' => $page,

            'contentHeaderPrimary' => $contentHeaderPrimary,

            'contentSidebarPrimary' => $contentSidebarPrimary,
            'contentSidebarSecondary' => $contentSidebarSecondary,
            'contentSidebarTertiary' => $contentSidebarTertiary,

            'contentBodyPrimary' => $contentBodyPrimary,

            'contentFooterPrimary' => $contentFooterPrimary,
            'contentFooterSecondary' => $contentFooterSecondary,

        ]);
    }

    /**
     * @Route("/post/{slug}", name="post", methods={"GET","HEAD"})
     */
    public function post(string $slug): Response
    {
        $menuRepository = $this->getDoctrine()->getRepository(Menu::class);
        $postRepository = $this->getDoctrine()->getRepository(Post::class);

        $mainMenu = $menuRepository->findBy(['menuType' => 1],['weight' => 'asc']);
        $legalMenu = $menuRepository->findBy(['menuType' => 2],['weight' => 'asc']);
        $socialMenu = $menuRepository->findBy(['menuType' => 3],['weight' => 'asc']);

        $post = $postRepository->findOneBy(['slug' => $slug]);

        return $this->render('app/post.html.twig', [
            'main_menu' => $mainMenu,
            'legal_menu' => $legalMenu,
            'social_menu' => $socialMenu,
            'post' => $post,
        ]);
    }
}
