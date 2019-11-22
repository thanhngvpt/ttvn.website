<?php namespace Tests\Repositories;

use App\Models\Company;
use Tests\TestCase;

class CompanyRepositoryTest extends TestCase
{
    protected $useDatabase = true;

    public function testGetInstance()
    {
        /** @var  \App\Repositories\CompanyRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\CompanyRepositoryInterface::class);
        $this->assertNotNull($repository);
    }

    public function testGetList()
    {
        $companies = factory(Company::class, 3)->create();
        $companyIds = $companies->pluck('id')->toArray();

        /** @var  \App\Repositories\CompanyRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\CompanyRepositoryInterface::class);
        $this->assertNotNull($repository);

        $companiesCheck = $repository->get('id', 'asc', 0, 1);
        $this->assertInstanceOf(Company::class, $companiesCheck[0]);

        $companiesCheck = $repository->getByIds($companyIds);
        $this->assertEquals(3, count($companiesCheck));
    }

    public function testFind()
    {
        $companies = factory(Company::class, 3)->create();
        $companyIds = $companies->pluck('id')->toArray();

        /** @var  \App\Repositories\CompanyRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\CompanyRepositoryInterface::class);
        $this->assertNotNull($repository);

        $companyCheck = $repository->find($companyIds[0]);
        $this->assertEquals($companyIds[0], $companyCheck->id);
    }

    public function testCreate()
    {
        $companyData = factory(Company::class)->make();

        /** @var  \App\Repositories\CompanyRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\CompanyRepositoryInterface::class);
        $this->assertNotNull($repository);

        $companyCheck = $repository->create($companyData->toFillableArray());
        $this->assertNotNull($companyCheck);
    }

    public function testUpdate()
    {
        $companyData = factory(Company::class)->create();

        /** @var  \App\Repositories\CompanyRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\CompanyRepositoryInterface::class);
        $this->assertNotNull($repository);

        $companyCheck = $repository->update($companyData, $companyData->toFillableArray());
        $this->assertNotNull($companyCheck);
    }

    public function testDelete()
    {
        $companyData = factory(Company::class)->create();

        /** @var  \App\Repositories\CompanyRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\CompanyRepositoryInterface::class);
        $this->assertNotNull($repository);

        $repository->delete($companyData);

        $companyCheck = $repository->find($companyData->id);
        $this->assertNull($companyCheck);
    }

}
