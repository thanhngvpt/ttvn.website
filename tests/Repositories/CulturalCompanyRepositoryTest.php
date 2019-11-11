<?php namespace Tests\Repositories;

use App\Models\CulturalCompany;
use Tests\TestCase;

class CulturalCompanyRepositoryTest extends TestCase
{
    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Repositories\CulturalCompanyRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\CulturalCompanyRepositoryInterface::class);
        $this->assertNotNull($repository);
    }

    public function testGetList()
    {
        $culturalCompanies = factory(CulturalCompany::class, 3)->create();
        $culturalCompanyIds = $culturalCompanies->pluck('id')->toArray();

        /** @var  \App\Repositories\CulturalCompanyRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\CulturalCompanyRepositoryInterface::class);
        $this->assertNotNull($repository);

        $culturalCompaniesCheck = $repository->get('id', 'asc', 0, 1);
        $this->assertInstanceOf(CulturalCompany::class, $culturalCompaniesCheck[0]);

        $culturalCompaniesCheck = $repository->getByIds($culturalCompanyIds);
        $this->assertEquals(3, count($culturalCompaniesCheck));
    }

    public function testFind()
    {
        $culturalCompanies = factory(CulturalCompany::class, 3)->create();
        $culturalCompanyIds = $culturalCompanies->pluck('id')->toArray();

        /** @var  \App\Repositories\CulturalCompanyRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\CulturalCompanyRepositoryInterface::class);
        $this->assertNotNull($repository);

        $culturalCompanyCheck = $repository->find($culturalCompanyIds[0]);
        $this->assertEquals($culturalCompanyIds[0], $culturalCompanyCheck->id);
    }

    public function testCreate()
    {
        $culturalCompanyData = factory(CulturalCompany::class)->make();

        /** @var  \App\Repositories\CulturalCompanyRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\CulturalCompanyRepositoryInterface::class);
        $this->assertNotNull($repository);

        $culturalCompanyCheck = $repository->create($culturalCompanyData->toFillableArray());
        $this->assertNotNull($culturalCompanyCheck);
    }

    public function testUpdate()
    {
        $culturalCompanyData = factory(CulturalCompany::class)->create();

        /** @var  \App\Repositories\CulturalCompanyRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\CulturalCompanyRepositoryInterface::class);
        $this->assertNotNull($repository);

        $culturalCompanyCheck = $repository->update($culturalCompanyData, $culturalCompanyData->toFillableArray());
        $this->assertNotNull($culturalCompanyCheck);
    }

    public function testDelete()
    {
        $culturalCompanyData = factory(CulturalCompany::class)->create();

        /** @var  \App\Repositories\CulturalCompanyRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\CulturalCompanyRepositoryInterface::class);
        $this->assertNotNull($repository);

        $repository->delete($culturalCompanyData);

        $culturalCompanyCheck = $repository->find($culturalCompanyData->id);
        $this->assertNull($culturalCompanyCheck);
    }

}
