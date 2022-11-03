<?php

namespace App\Entity;

use Serializable;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\AvatarRepository;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: AvatarRepository::class)]
#[Vich\Uploadable]

class Avatar implements Serializable
{


// ##################################################################### //
// ############################# PROPRIÉTÉS ############################ //
// ##################################################################### //

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageName = null;

    // NOTE: This is not a mapped field of entity metadata, just a simple property.
    #[Vich\UploadableField(mapping: 'avatars', fileNameProperty: 'imageName')]
    #[Assert\Image(
        minWidth:100,
        maxWidth:400,
        minHeight:100,
        maxHeight:400,
        minWidthMessage:"La largeur de votre image doit être compris entre 100px et 400px",
        maxWidthMessage:"La largeur de votre image doit être compris entre 100px et 400px",
        minHeightMessage:"La hauteur de votre image doit être compris entre 100px et 400px",
        maxHeightMessage:"La hauteur de votre image doit être compris entre 100px et 400px",
    )]
    private ?File $imageFile = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;


// ##################################################################### //
// ########################### GETTER/SETTER ########################### //
// ##################################################################### //
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(?string $imageName): self
    {
        $this->imageName = $imageName;

        return $this;
    }

/**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }



    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

// ##################################################################### //
// ########################### SERIALIZATION ########################### //
// ##################################################################### //

    public function serialize(){
        return serialize([
            $this->id,
            $this->imageName,
        ]);
    }
    public function unserialize($serialized){
        list(
            $this->id,
            $this->imageName,
        ) = unserialize($serialized);
    }
}
