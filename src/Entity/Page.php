<?php

namespace App\Entity;

use App\Repository\PageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=PageRepository::class)
 */
class Page
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=View::class, inversedBy="pages")
     */
    private $blockHeaderPrimary;

    /**
     * @ORM\ManyToOne(targetEntity=View::class, inversedBy="pages")
     */
    private $blockHeaderSecondary;

    /**
     * @ORM\ManyToOne(targetEntity=View::class, inversedBy="pages")
     */
    private $blockHeaderTertiary;

    /**
     * @ORM\ManyToOne(targetEntity=View::class, inversedBy="pages")
     */
    private $blockHeaderQuaternary;

    /**
     * @ORM\ManyToOne(targetEntity=View::class, inversedBy="pages")
     */
    private $blockBodyPrimary;

    /**
     * @ORM\ManyToOne(targetEntity=View::class, inversedBy="pages")
     */
    private $blockBodySecondary;

    /**
     * @ORM\ManyToOne(targetEntity=View::class, inversedBy="pages")
     */
    private $blockBodyTertiary;

    /**
     * @ORM\ManyToOne(targetEntity=View::class, inversedBy="pages")
     */
    private $blockBodyQuaternary;

    /**
     * @ORM\ManyToOne(targetEntity=View::class, inversedBy="pages")
     */
    private $blockSidebarPrimary;

    /**
     * @ORM\ManyToOne(targetEntity=View::class, inversedBy="pages")
     */
    private $blockSidebarSecondary;

    /**
     * @ORM\ManyToOne(targetEntity=View::class, inversedBy="pages")
     */
    private $blockSidebarTertiary;

    /**
     * @ORM\ManyToOne(targetEntity=View::class, inversedBy="pages")
     */
    private $blockSidebarQuaternary;

    /**
     * @ORM\ManyToOne(targetEntity=View::class, inversedBy="pages")
     */
    private $blockFooterPrimary;

    /**
     * @ORM\ManyToOne(targetEntity=View::class, inversedBy="pages")
     */
    private $blockFooterSecondary;

    /**
     * @ORM\ManyToOne(targetEntity=View::class, inversedBy="pages")
     */
    private $blockFooterTertiary;

    /**
     * @ORM\ManyToOne(targetEntity=View::class, inversedBy="pages")
     */
    private $blockFooterQuaternary;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isPublished;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $content;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $hasCustomContent;

    /**
     * @ORM\ManyToMany(targetEntity=Menu::class, mappedBy="pages")
     */
    private $menus;

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;

    }


    /**
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isFrontpage;

    public function __toString()
    {
        return $this->title;
    }

    public function __construct()
    {
        $this->menus = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getBlockHeaderPrimary(): ?View
    {
        return $this->blockHeaderPrimary;
    }

    public function setBlockHeaderPrimary(?View $blockHeaderPrimary): self
    {
        $this->blockHeaderPrimary = $blockHeaderPrimary;

        return $this;
    }

    public function getBlockHeaderSecondary(): ?View
    {
        return $this->blockHeaderSecondary;
    }

    public function setBlockHeaderSecondary(?View $blockHeaderSecondary): self
    {
        $this->blockHeaderSecondary = $blockHeaderSecondary;

        return $this;
    }

    public function getBlockHeaderTertiary(): ?View
    {
        return $this->blockHeaderTertiary;
    }

    public function setBlockHeaderTertiary(?View $blockHeaderTertiary): self
    {
        $this->blockHeaderTertiary = $blockHeaderTertiary;

        return $this;
    }

    public function getBlockHeaderQuaternary(): ?View
    {
        return $this->blockHeaderQuaternary;
    }

    public function setBlockHeaderQuaternary(?View $blockHeaderQuaternary): self
    {
        $this->blockHeaderQuaternary = $blockHeaderQuaternary;

        return $this;
    }

    public function getBlockBodyPrimary(): ?View
    {
        return $this->blockBodyPrimary;
    }

    public function setBlockBodyPrimary(?View $blockBodyPrimary): self
    {
        $this->blockBodyPrimary = $blockBodyPrimary;

        return $this;
    }

    public function getBlockBodySecondary(): ?View
    {
        return $this->blockBodySecondary;
    }

    public function setBlockBodySecondary(?View $blockBodySecondary): self
    {
        $this->blockBodySecondary = $blockBodySecondary;

        return $this;
    }

    public function getBlockBodyTertiary(): ?View
    {
        return $this->blockBodyTertiary;
    }

    public function setBlockBodyTertiary(?View $blockBodyTertiary): self
    {
        $this->blockBodyTertiary = $blockBodyTertiary;

        return $this;
    }

    public function getBlockBodyQuaternary(): ?View
    {
        return $this->blockBodyQuaternary;
    }

    public function setBlockBodyQuaternary(?View $blockBodyQuaternary): self
    {
        $this->blockBodyQuaternary = $blockBodyQuaternary;

        return $this;
    }

    public function getBlockSidebarPrimary(): ?View
    {
        return $this->blockSidebarPrimary;
    }

    public function setBlockSidebarPrimary(?View $blockSidebarPrimary): self
    {
        $this->blockSidebarPrimary = $blockSidebarPrimary;

        return $this;
    }

    public function getBlockSidebarSecondary(): ?View
    {
        return $this->blockSidebarSecondary;
    }

    public function setBlockSidebarSecondary(?View $blockSidebarSecondary): self
    {
        $this->blockSidebarSecondary = $blockSidebarSecondary;

        return $this;
    }

    public function getBlockSidebarQuaternary(): ?View
    {
        return $this->blockSidebarQuaternary;
    }

    public function setBlockSidebarQuaternary(?View $blockSidebarQuaternary): self
    {
        $this->blockSidebarQuaternary = $blockSidebarQuaternary;

        return $this;
    }

    public function getBlockFooterPrimary(): ?View
    {
        return $this->blockFooterPrimary;
    }

    public function setBlockFooterPrimary(?View $blockFooterPrimary): self
    {
        $this->blockFooterPrimary = $blockFooterPrimary;

        return $this;
    }

    public function getBlockFooterSecondary(): ?View
    {
        return $this->blockFooterSecondary;
    }

    public function setBlockFooterSecondary(?View $blockFooterSecondary): self
    {
        $this->blockFooterSecondary = $blockFooterSecondary;

        return $this;
    }

    public function getBlockFooterTertiary(): ?View
    {
        return $this->blockFooterTertiary;
    }

    public function setBlockFooterTertiary(?View $blockFooterTertiary): self
    {
        $this->blockFooterTertiary = $blockFooterTertiary;

        return $this;
    }

    public function getBlockFooterQuaternary(): ?View
    {
        return $this->blockFooterQuaternary;
    }

    public function setBlockFooterQuaternary(?View $blockFooterQuaternary): self
    {
        $this->blockFooterQuaternary = $blockFooterQuaternary;

        return $this;
    }

    public function getIsPublished(): ?bool
    {
        return $this->isPublished;
    }

    public function setIsPublished(?bool $isPublished): self
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getBlockSidebarTertiary(): ?View
    {
        return $this->blockSidebarTertiary;
    }

    public function setBlockSidebarTertiary(?View $blockSidebarTertiary): self
    {
        $this->blockSidebarTertiary = $blockSidebarTertiary;

        return $this;
    }

    public function getHasCustomContent(): ?bool
    {
        return $this->hasCustomContent;
    }

    public function setHasCustomContent(?bool $hasCustomContent): self
    {
        $this->hasCustomContent = $hasCustomContent;

        return $this;
    }

    /**
     * @return Collection|Menu[]
     */
    public function getMenus(): Collection
    {
        return $this->menus;
    }

    public function addMenu(Menu $menu): self
    {
        if (!$this->menus->contains($menu)) {
            $this->menus[] = $menu;
            $menu->addPage($this);
        }

        return $this;
    }

    public function removeMenu(Menu $menu): self
    {
        if ($this->menus->removeElement($menu)) {
            $menu->removePage($this);
        }

        return $this;
    }

    public function getIsFrontpage(): ?bool
    {
        return $this->isFrontpage;
    }

    public function setIsFrontpage(?bool $isFrontpage): self
    {
        $this->isFrontpage = $isFrontpage;

        return $this;
    }
}
