<?php

namespace App\Entity;

use App\Repository\ViewRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=ViewRepository::class)
 */
class View
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
     * @ORM\ManyToMany(targetEntity=ContentType::class, inversedBy="views")
     */
    private $contentTypes;

    /**
     * @ORM\ManyToMany(targetEntity=Tag::class, inversedBy="views")
     */
    private $tags;

    /**
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numberOfPosts;

    /**
     * @ORM\ManyToOne(targetEntity=ViewType::class, inversedBy="views")
     */
    private $viewTypes;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sortPostsBy;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $orderBy;

    /**
     * @ORM\OneToMany(targetEntity=Page::class, mappedBy="blockHeaderPrimary")
     */
    private $pages;

    public function __toString()
    {
        return $this->getId() . ' | '. $this->title;

    }

    public function __construct()
    {
        $this->contentTypes = new ArrayCollection();
        $this->tags = new ArrayCollection();
        $this->pages = new ArrayCollection();
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

    /**
     * @return Collection|ContentType[]
     */
    public function getContentTypes(): Collection
    {
        return $this->contentTypes;
    }

    public function addContentType(ContentType $contentType): self
    {
        if (!$this->contentTypes->contains($contentType)) {
            $this->contentTypes[] = $contentType;
        }

        return $this;
    }

    public function removeContentType(ContentType $contentType): self
    {
        $this->contentTypes->removeElement($contentType);

        return $this;
    }

    /**
     * @return Collection|Tag[]
     */
    public function gettags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tag $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
        }

        return $this;
    }

    public function removeTag(Tag $tag): self
    {
        $this->tags->removeElement($tag);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    public function getNumberOfPosts(): ?int
    {
        return $this->numberOfPosts;
    }

    public function setNumberOfPosts(?int $numberOfPosts): self
    {
        $this->numberOfPosts = $numberOfPosts;

        return $this;
    }

    public function getViewTypes(): ?ViewType
    {
        return $this->viewTypes;
    }

    public function setViewTypes(?ViewType $viewTypes): self
    {
        $this->viewTypes = $viewTypes;

        return $this;
    }

    public function getSortPostsBy(): ?string
    {
        return $this->sortPostsBy;
    }

    public function setSortPostsBy(?string $sortPostsBy): self
    {
        $this->sortPostsBy = $sortPostsBy;

        return $this;
    }

    public function getOrderBy(): ?string
    {
        return $this->orderBy;
    }

    public function setOrderBy(?string $orderBy): self
    {
        $this->orderBy = $orderBy;

        return $this;
    }

    /**
     * @return Collection|Page[]
     */
    public function getPages(): Collection
    {
        return $this->pages;
    }

    public function addPage(Page $page): self
    {
        if (!$this->pages->contains($page)) {
            $this->pages[] = $page;
            $page->setBlockHeaderPrimary($this);
        }

        return $this;
    }

    public function removePage(Page $page): self
    {
        if ($this->pages->removeElement($page)) {
            // set the owning side to null (unless already changed)
            if ($page->getBlockHeaderPrimary() === $this) {
                $page->setBlockHeaderPrimary(null);
            }
        }

        return $this;
    }

}
