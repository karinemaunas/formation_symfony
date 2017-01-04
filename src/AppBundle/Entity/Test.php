<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Test
 *
 * @ORM\Table(name="test")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TestRepository")
 */
class Test
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="test1", type="string", length=255)
     */
    private $test1;

    /**
     * @var string
     *
     * @ORM\Column(name="test2", type="string", length=255)
     */
    private $test2;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set test1
     *
     * @param string $test1
     *
     * @return Test
     */
    public function setTest1($test1)
    {
        $this->test1 = $test1;

        return $this;
    }

    /**
     * Get test1
     *
     * @return string
     */
    public function getTest1()
    {
        return $this->test1;
    }

    /**
     * Set test2
     *
     * @param string $test2
     *
     * @return Test
     */
    public function setTest2($test2)
    {
        $this->test2 = $test2;

        return $this;
    }

    /**
     * Get test2
     *
     * @return string
     */
    public function getTest2()
    {
        return $this->test2;
    }
}

