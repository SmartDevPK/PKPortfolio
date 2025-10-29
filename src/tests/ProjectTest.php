<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../models/Project.php';

final class ProjectTest extends TestCase
{
    public function testProjectProperties(): void
    {
        $project = new Project('Portfolio', 'My personal site', 'Web Developer');

        $this->assertSame('Portfolio', $project->getName());
        $this->assertSame('My personal site', $project->getDescription());
        $this->assertSame('Web Developer', $project->getHeading());
    }

    public function testToArrayReturnsAssociativeArray(): void
    {
        $project = new Project('Portfolio', 'My personal site', 'Web Developer');

        $expected = [
            'name' => 'Portfolio',
            'description' => 'My personal site',
            'heading' => 'Web Developer',
        ];

        $this->assertSame($expected, $project->toArray());
    }
}
