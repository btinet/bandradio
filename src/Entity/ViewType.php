<?php

namespace App\Entity;

use App\Repository\ViewTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=ViewTypeRepository::class)
 */
class ViewType
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $template;

    /**
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity=View::class, mappedBy="viewTypes")
     */
    private $views;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $hasTitle;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $hasDescription;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $hasContent;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $hasImage;

    public function __construct()
    {
        $this->views = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->title;
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

    public function getTemplate(): ?string
    {
        return $this->template;
    }

    public function setTemplate(string $template): self
    {
        $this->template = $template;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @return Collection|View[]
     */
    public function getViews(): Collection
    {
        return $this->views;
    }

    public function addView(View $view): self
    {
        if (!$this->views->contains($view)) {
            $this->views[] = $view;
            $view->setViewTypes($this);
        }

        return $this;
    }

    public function removeView(View $view): self
    {
        if ($this->views->removeElement($view)) {
            // set the owning side to null (unless already changed)
            if ($view->getViewTypes() === $this) {
                $view->setViewTypes(null);
            }
        }

        return $this;
    }

    public function getHasTitle(): ?bool
    {
        return $this->hasTitle;
    }

    public function setHasTitle(?bool $hasTitle): self
    {
        $this->hasTitle = $hasTitle;

        return $this;
    }

    public function getHasDescription(): ?bool
    {
        return $this->hasDescription;
    }

    public function setHasDescription(?bool $hasDescription): self
    {
        $this->hasDescription = $hasDescription;

        return $this;
    }

    public function getHasContent(): ?bool
    {
        return $this->hasContent;
    }

    public function setHasContent(?bool $hasContent): self
    {
        $this->hasContent = $hasContent;

        return $this;
    }

    public function getHasImage(): ?bool
    {
        return $this->hasImage;
    }

    public function setHasImage(?bool $hasImage): self
    {
        $this->hasImage = $hasImage;

        return $this;
    }

}
