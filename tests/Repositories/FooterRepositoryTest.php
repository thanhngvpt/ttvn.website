<?php namespace Tests\Repositories;

use App\Models\Footer;
use Tests\TestCase;

class FooterRepositoryTest extends TestCase
{
    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Repositories\FooterRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\FooterRepositoryInterface::class);
        $this->assertNotNull($repository);
    }

    public function testGetList()
    {
        $footers = factory(Footer::class, 3)->create();
        $footerIds = $footers->pluck('id')->toArray();

        /** @var  \App\Repositories\FooterRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\FooterRepositoryInterface::class);
        $this->assertNotNull($repository);

        $footersCheck = $repository->get('id', 'asc', 0, 1);
        $this->assertInstanceOf(Footer::class, $footersCheck[0]);

        $footersCheck = $repository->getByIds($footerIds);
        $this->assertEquals(3, count($footersCheck));
    }

    public function testFind()
    {
        $footers = factory(Footer::class, 3)->create();
        $footerIds = $footers->pluck('id')->toArray();

        /** @var  \App\Repositories\FooterRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\FooterRepositoryInterface::class);
        $this->assertNotNull($repository);

        $footerCheck = $repository->find($footerIds[0]);
        $this->assertEquals($footerIds[0], $footerCheck->id);
    }

    public function testCreate()
    {
        $footerData = factory(Footer::class)->make();

        /** @var  \App\Repositories\FooterRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\FooterRepositoryInterface::class);
        $this->assertNotNull($repository);

        $footerCheck = $repository->create($footerData->toFillableArray());
        $this->assertNotNull($footerCheck);
    }

    public function testUpdate()
    {
        $footerData = factory(Footer::class)->create();

        /** @var  \App\Repositories\FooterRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\FooterRepositoryInterface::class);
        $this->assertNotNull($repository);

        $footerCheck = $repository->update($footerData, $footerData->toFillableArray());
        $this->assertNotNull($footerCheck);
    }

    public function testDelete()
    {
        $footerData = factory(Footer::class)->create();

        /** @var  \App\Repositories\FooterRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\FooterRepositoryInterface::class);
        $this->assertNotNull($repository);

        $repository->delete($footerData);

        $footerCheck = $repository->find($footerData->id);
        $this->assertNull($footerCheck);
    }

}
