<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Objects;

use Illuminate\Support\Arr;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use BuckhamDuffy\LaravelXeroPracticeManager\Support\AbstractResponse;
use BuckhamDuffy\LaravelXeroPracticeManager\Objects\Client\RelationshipData;

class ClientData extends AbstractResponse
{
	public static ?string $unwrap = 'Client';
	public static array $relations = ['Relationships', 'Groups', 'Notes', 'Contacts'];

	public ?string $UUID = null;
	public ?string $Name = null;
	public ?string $Email = null;
	public ?string $Address = null;
	public ?string $City = null;
	public ?string $Region = null;
	public ?string $PostCode = null;
	public ?string $Country = null;
	public ?string $PostalAddress = null;
	public ?string $PostalCity = null;
	public ?string $PostalRegion = null;
	public ?string $PostalPostCode = null;
	public ?string $PostalCountry = null;
	public ?string $Phone = null;
	public ?string $Fax = null;
	public ?string $Website = null;
	public ?string $ExportCode = null;
	public ?string $Title = null;
	public ?string $FirstName = null;
	public ?string $LastName = null;
	public ?string $OtherName = null;
	public ?string $DateOfBirth = null;
	public ?string $Gender = null;
	public ?string $ReferralSource = null;
	public ?string $IsProspect = null;
	public ?string $IsDeleted = null;
	public ?string $IsArchived = null;
	public ?string $TaxNumber = null;
	public ?string $CompanyNumber = null;
	public ?string $BusinessNumber = null;
	public ?string $BusinessStructure = null;
	public ?string $BalanceMonth = null;
	public ?string $PrepareGST = null;
	public ?string $GSTRegistered = null;
	public ?string $GSTPeriod = null;
	public ?string $GSTBasis = null;
	public ?string $ProvisionalTaxBasis = null;
	public ?string $SignedTaxAuthority = null;
	public ?string $TaxAgent = null;
	public ?string $AgencyStatus = null;
	public ?string $ReturnType = null;
	public ?string $PrepareActivityStatement = null;
	public ?string $PrepareTaxReturn = null;
	public ?RelatedData $AccountManager = null;
	public ?RelatedData $JobManager = null;

	#[DataCollectionOf(RelatedData::class)]
	public ?DataCollection $Groups = null;

	#[DataCollectionOf(RelationshipData::class)]
	public ?DataCollection $Relationships = null;

	#[DataCollectionOf(RelatedData::class)]
	public ?DataCollection $Contacts = null;

	public function getUUID(): ?string
	{
		return $this->UUID;
	}

	public function setUUID(?string $UUID): ClientData
	{
		$this->UUID = $UUID;
		return $this;
	}

	public function getName(): ?string
	{
		return $this->Name;
	}

	public function setName(?string $Name): ClientData
	{
		$this->Name = $Name;
		return $this;
	}

	public function getEmail(): ?string
	{
		return $this->Email;
	}

	public function setEmail(?string $Email): ClientData
	{
		$this->Email = $Email;
		return $this;
	}

	public function getAddress(): ?string
	{
		return trim($this->Address ?: '');
	}

	public function setAddress(?string $Address): ClientData
	{
		$this->Address = $Address;
		return $this;
	}

	public function getCity(): ?string
	{
		return $this->City;
	}

	public function setCity(?string $City): ClientData
	{
		$this->City = $City;
		return $this;
	}

	public function getRegion(): ?string
	{
		return $this->Region;
	}

	public function setRegion(?string $Region): ClientData
	{
		$this->Region = $Region;
		return $this;
	}

	public function getPostCode(): ?string
	{
		return $this->PostCode;
	}

	public function setPostCode(?string $PostCode): ClientData
	{
		$this->PostCode = $PostCode;
		return $this;
	}

	public function getCountry(): ?string
	{
		return $this->Country;
	}

	public function setCountry(?string $Country): ClientData
	{
		$this->Country = $Country;
		return $this;
	}

	public function getPostalAddress(): ?string
	{
		return trim($this->PostalAddress ?: '');
	}

	public function setPostalAddress(?string $PostalAddress): ClientData
	{
		$this->PostalAddress = $PostalAddress;
		return $this;
	}

	public function getPostalCity(): ?string
	{
		return $this->PostalCity;
	}

	public function setPostalCity(?string $PostalCity): ClientData
	{
		$this->PostalCity = $PostalCity;
		return $this;
	}

	public function getPostalRegion(): ?string
	{
		return $this->PostalRegion;
	}

	public function setPostalRegion(?string $PostalRegion): ClientData
	{
		$this->PostalRegion = $PostalRegion;
		return $this;
	}

	public function getPostalPostCode(): ?string
	{
		return $this->PostalPostCode;
	}

	public function setPostalPostCode(?string $PostalPostCode): ClientData
	{
		$this->PostalPostCode = $PostalPostCode;
		return $this;
	}

	public function getPostalCountry(): ?string
	{
		return $this->PostalCountry;
	}

	public function setPostalCountry(?string $PostalCountry): ClientData
	{
		$this->PostalCountry = $PostalCountry;
		return $this;
	}

	public function getPhone(): ?string
	{
		return $this->Phone;
	}

	public function setPhone(?string $Phone): ClientData
	{
		$this->Phone = $Phone;
		return $this;
	}

	public function getFax(): ?string
	{
		return $this->Fax;
	}

	public function setFax(?string $Fax): ClientData
	{
		$this->Fax = $Fax;
		return $this;
	}

	public function getWebsite(): ?string
	{
		return $this->Website;
	}

	public function setWebsite(?string $Website): ClientData
	{
		$this->Website = $Website;
		return $this;
	}

	public function getExportCode(): ?string
	{
		return $this->ExportCode;
	}

	public function setExportCode(?string $ExportCode): ClientData
	{
		$this->ExportCode = $ExportCode;
		return $this;
	}

	public function getFirstName(): ?string
	{
		return $this->FirstName;
	}

	public function setFirstName(?string $FirstName): ClientData
	{
		$this->FirstName = $FirstName;
		return $this;
	}

	public function getLastName(): ?string
	{
		return $this->LastName;
	}

	public function setLastName(?string $LastName): ClientData
	{
		$this->LastName = $LastName;
		return $this;
	}

	public function getOtherName(): ?string
	{
		return $this->OtherName;
	}

	public function setOtherName(?string $OtherName): ClientData
	{
		$this->OtherName = $OtherName;
		return $this;
	}

	public function getDateOfBirth(): ?string
	{
		return $this->DateOfBirth;
	}

	public function setDateOfBirth(?string $DateOfBirth): ClientData
	{
		$this->DateOfBirth = $DateOfBirth;
		return $this;
	}

	public function getIsProspect(): ?string
	{
		return $this->IsProspect;
	}

	public function setIsProspect(?string $IsProspect): ClientData
	{
		$this->IsProspect = $IsProspect;
		return $this;
	}

	public function getTaxNumber(): ?string
	{
		return $this->TaxNumber;
	}

	public function setTaxNumber(?string $TaxNumber): ClientData
	{
		$this->TaxNumber = $TaxNumber;
		return $this;
	}

	public function getCompanyNumber(): ?string
	{
		return $this->CompanyNumber;
	}

	public function setCompanyNumber(?string $CompanyNumber): ClientData
	{
		$this->CompanyNumber = $CompanyNumber;
		return $this;
	}

	public function getBusinessNumber(): ?string
	{
		return $this->BusinessNumber;
	}

	public function setBusinessNumber(?string $BusinessNumber): ClientData
	{
		$this->BusinessNumber = $BusinessNumber;
		return $this;
	}

	public function getBusinessStructure(): ?string
	{
		return $this->BusinessStructure;
	}

	public function setBusinessStructure(?string $BusinessStructure): ClientData
	{
		$this->BusinessStructure = $BusinessStructure;
		return $this;
	}

	public function getBalanceMonth(): ?string
	{
		return $this->BalanceMonth;
	}

	public function setBalanceMonth(?string $BalanceMonth): ClientData
	{
		$this->BalanceMonth = $BalanceMonth;
		return $this;
	}

	public function getPrepareGST(): ?string
	{
		return $this->PrepareGST;
	}

	public function setPrepareGST(?string $PrepareGST): ClientData
	{
		$this->PrepareGST = $PrepareGST;
		return $this;
	}

	public function getGSTRegistered(): ?string
	{
		return $this->GSTRegistered;
	}

	public function setGSTRegistered(?string $GSTRegistered): ClientData
	{
		$this->GSTRegistered = $GSTRegistered;
		return $this;
	}

	public function getGSTPeriod(): ?string
	{
		return $this->GSTPeriod;
	}

	public function setGSTPeriod(?string $GSTPeriod): ClientData
	{
		$this->GSTPeriod = $GSTPeriod;
		return $this;
	}

	public function getGSTBasis(): ?string
	{
		return $this->GSTBasis;
	}

	public function setGSTBasis(?string $GSTBasis): ClientData
	{
		$this->GSTBasis = $GSTBasis;
		return $this;
	}

	public function getProvisionalTaxBasis(): ?string
	{
		return $this->ProvisionalTaxBasis;
	}

	public function setProvisionalTaxBasis(?string $ProvisionalTaxBasis): ClientData
	{
		$this->ProvisionalTaxBasis = $ProvisionalTaxBasis;
		return $this;
	}

	public function getSignedTaxAuthority(): ?string
	{
		return $this->SignedTaxAuthority;
	}

	public function setSignedTaxAuthority(?string $SignedTaxAuthority): ClientData
	{
		$this->SignedTaxAuthority = $SignedTaxAuthority;
		return $this;
	}

	public function getTaxAgent(): ?string
	{
		return $this->TaxAgent;
	}

	public function setTaxAgent(?string $TaxAgent): ClientData
	{
		$this->TaxAgent = $TaxAgent;
		return $this;
	}

	public function getAgencyStatus(): ?string
	{
		return $this->AgencyStatus;
	}

	public function setAgencyStatus(?string $AgencyStatus): ClientData
	{
		$this->AgencyStatus = $AgencyStatus;
		return $this;
	}

	public function getReturnType(): ?string
	{
		return $this->ReturnType;
	}

	public function setReturnType(?string $ReturnType): ClientData
	{
		$this->ReturnType = $ReturnType;
		return $this;
	}

	public function getPrepareActivityStatement(): ?string
	{
		return $this->PrepareActivityStatement;
	}

	public function setPrepareActivityStatement(?string $PrepareActivityStatement): ClientData
	{
		$this->PrepareActivityStatement = $PrepareActivityStatement;
		return $this;
	}

	public function getPrepareTaxReturn(): ?string
	{
		return $this->PrepareTaxReturn;
	}

	public function setPrepareTaxReturn(?string $PrepareTaxReturn): ClientData
	{
		$this->PrepareTaxReturn = $PrepareTaxReturn;
		return $this;
	}

	/**
	 * @return DataCollection<RelatedData>
	 */
	public function getGroups(): DataCollection
	{
		return $this->Groups ?: RelatedData::collection([]);
	}

	public function setGroups(?DataCollection $Groups): ClientData
	{
		$this->Groups = $Groups;
		return $this;
	}

	/**
	 * @return DataCollection<int, RelationshipData>
	 */
	public function getRelationships(): DataCollection
	{
		return $this->Relationships ?: RelationshipData::collection([]);
	}

	public function setRelationships(?DataCollection $Relationships): ClientData
	{
		$this->Relationships = $Relationships;
		return $this;
	}

	public function getContacts(): ?DataCollection
	{
		return $this->Contacts;
	}

	public function setContacts(?DataCollection $Contacts): ClientData
	{
		$this->Contacts = $Contacts;
		return $this;
	}

	public function getReferralSource(): ?string
	{
		return $this->ReferralSource;
	}

	public function setReferralSource(?string $ReferralSource): ClientData
	{
		$this->ReferralSource = $ReferralSource;
		return $this;
	}

	public function getIsDeleted(): ?string
	{
		return $this->IsDeleted;
	}

	public function setIsDeleted(?string $IsDeleted): ClientData
	{
		$this->IsDeleted = $IsDeleted;
		return $this;
	}

	public function getIsArchived(): ?string
	{
		return $this->IsArchived;
	}

	public function setIsArchived(?string $IsArchived): ClientData
	{
		$this->IsArchived = $IsArchived;
		return $this;
	}

	public function getAccountManager(): ?RelatedData
	{
		return $this->AccountManager;
	}

	public function getJobManager(): ?RelatedData
	{
		return $this->JobManager;
	}

	public function getTitle(): ?string
	{
		return $this->Title;
	}

	public function setTitle(?string $Title): void
	{
		$this->Title = $Title;
	}

	public function getGender(): ?string
	{
		return $this->Gender;
	}

	public function setGender(?string $Gender): void
	{
		$this->Gender = $Gender;
	}

	public function toArray(): array
	{
		return Arr::except(
			array_merge(
				parent::toArray(),
				[
					'AccountManagerUUID' => $this->getAccountManager()?->getUUID(),
					'JobManagerUUID'     => $this->getJobManager()?->getUUID(),
				],
			),
			[
				'Groups',
				'Relationships',
				'Contacts',
				'AccountManager',
				'JobManager',
			]
		);
	}
}
