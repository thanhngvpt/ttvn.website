<?php namespace Tests\Repositories;

use App\Models\Partner;
use Tests\TestCase;

class PartnerRepositoryTest extends TestCase
{
    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Repositories\PartnerRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\PartnerRepositoryInterface::class);
        $this->assertNotNull($repository);
    }

    public function testGetList()
    {
        $partners = factory(Partner::class, 3)->create();
        $partnerIds = $partners->pluck('id')->toArray();

        /** @var  \App\Repositories\PartnerRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\PartnerRepositoryInterface::class);
        $this->assertNotNull($repository);

        $partnersCheck = $repository->get('id', 'asc', 0, 1);
        $this->assertInstanceOf(Partner::class, $partnersCheck[0]);

        $partnersCheck = $repository->getByIds($partnerIds);
        $this->assertEquals(3, count($partnersCheck));
    }

    public function testFind()
    {
        $partners = factory(Partner::class, 3)->create();
        $partnerIds = $partners->pluck('id')->toArray();

        /** @var  \App\Repositories\PartnerRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\PartnerRepositoryInterface::class);
        $this->assertNotNull($repository);

        $partnerCheck = $repository->find($partnerIds[0]);
        $this->assertEquals($partnerIds[0], $partnerCheck->id);
    }

    public function testCreate()
    {
        $partnerData = factory(Partner::class)->make();

        /** @var  \App\Repositories\PartnerRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\PartnerRepositoryInterface::class);
        $this->assertNotNull($repository);

        $partnerCheck = $repository->create($partnerData->toFillableArray());
        $this->assertNotNull($partnerCheck);
    }

    public function testUpdate()
    {
        $partnerData = factory(Partner::class)->create();

        /** @var  \App\Repositories\PartnerRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\PartnerRepositoryInterface::class);
        $this->assertNotNull($repository);

        $partnerCheck = $repository->update($partnerData, $partnerData->toFillableArray());
        $this->assertNotNull($partnerCheck);
    }

    public function testDelete()
    {
        $partnerData = factory(Partner::class)->create();

        /** @var  \App\Repositories\PartnerRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\PartnerRepositoryInterface::class);
        $this->assertNotNull($repository);

        $repository->delete($partnerData);

        $partnerCheck = $repository->find($partnerData->id);
        $this->assertNull($partnerCheck);
    }

}
