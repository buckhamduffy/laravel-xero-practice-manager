<?php

use BuckhamDuffy\LaravelXeroPracticeManager\Objects\RelatedData;
use BuckhamDuffy\LaravelXeroPracticeManager\Responses\ClientCollectionResponse;
use Spatie\LaravelData\DataCollection;

it('can deserialize ClientCollection with multiple Clients', function () {
    $xml = <<<XML
        <Response>
          <Status>OK</Status>
          <Clients>
            <Client>
              <UUID>720c21d3-e812-4bb1-9d6b-ddeb4745e7b9</UUID>
              <Name>XYZ Australia, NZ Business Unit</Name>
              <Title />
              <Gender />
              <FirstName />
              <LastName />
              <OtherName />
              <Email>someone@example.com</Email>
              <DateOfBirth>1970-11-26T00:00:00</DateOfBirth>
              <Address />
              <City />
              <Region />
              <PostCode />
              <Country />
              <PostalAddress>
                 Level 32, PWC Building
                 188 Quay Street
                 Auckland Central
              </PostalAddress>
              <PostalCity>Auckland</PostalCity>
              <PostalRegion />
              <PostalPostCode>1001</PostalPostCode>
              <PostalCountry />
              <Phone>(02) 1723 5265</Phone>
              <Fax />
              <Website />
              <ReferralSource />
              <ExportCode />
              <IsProspect>No</IsProspect>
              <IsArchived>No</IsArchived>
              <IsDeleted>No</IsDeleted>
              <AccountManager>
                <UUID>dc48df15-1a5c-4675-9d82-4ca54e2c6e86</UUID>
                <Name>Jo Blogs</Name>
              </AccountManager>
              <Type>
                <Name>20th of Month</Name>
                <CostMarkup>30.00</CostMarkup>
                <PaymentTerm>DayOfMonth</PaymentTerm>
                <PaymentDay>20</PaymentDay>
              </Type>
              <Contacts>
                <Contact>
                  <UUID>10e45ad9-cd3f-42b9-9e7e-056e47c0c109</UUID>
                  <Name>Samantha Benecke</Name>
                  <Salutation>Sam</Salutation>
                  <Addressee>Mrs S Benecke</Addressee>
                  <Mobile />
                  <Email />
                  <Phone />
                  <IsDeleted>No</IsDeleted>
                  <IsPrimary>Yes</IsPrimary>
                  <Position />
                </Contact>
              </Contacts>
            </Client>
            <Client>
              <UUID>9e023415-b173-4375-b8d5-4220b5a6b294</UUID>
              <Name>A. Dutchess</Name>
              <Address />
              <City />
              <Region />
              <PostCode />
              <Country />
              <PostalAddress>P O Box 123</PostalAddress>
              <PostalCity>Wellington</PostalCity>
              <PostalRegion />
              <PostalPostCode>6011</PostalPostCode>
              <PostalCountry />
              <Phone />
              <Fax />
              <Website />
              <Contacts />
              <BillingClient>
                <UUID>f8235e1a-d383-48b7-9139-ba97ab8ca889</UUID>
                <Name>Billing Client</Name>
              </BillingClient>
            </Client>
          </Clients>
        </Response>
        XML;

    $response = ClientCollectionResponse::from(trim($xml));

    expect($response->getStatus())->toBe('OK');
    expect($response->getClients())->toHaveCount(2);

    $firstClient = $response->getClients()->offsetGet(0);

    expect($firstClient->getUuid())->toBe('720c21d3-e812-4bb1-9d6b-ddeb4745e7b9');
    expect($firstClient->getName())->toBe('XYZ Australia, NZ Business Unit');
    expect($firstClient->getTitle())->toBeNull();
    expect($firstClient->getGender())->toBeNull();
    expect($firstClient->getFirstName())->toBeNull();
    expect($firstClient->getLastName())->toBeNull();
    expect($firstClient->getOtherName())->toBeNull();
    expect($firstClient->getEmail())->toBe('someone@example.com');
    expect($firstClient->getDateOfBirth())->toBe('1970-11-26T00:00:00');
    expect($firstClient->getAddress())->toBe('');
    expect($firstClient->getCity())->toBeNull();
    expect($firstClient->getRegion())->toBeNull();
    expect($firstClient->getPostCode())->toBeNull();
    expect($firstClient->getCountry())->toBeNull();
    expect($firstClient->getPostalAddress())->toBe("Level 32, PWC Building
         188 Quay Street
         Auckland Central");
    expect($firstClient->getPostalCity())->toBe('Auckland');
    expect($firstClient->getPostalRegion())->toBeNull();
    expect($firstClient->getPostalPostCode())->toBe('1001');
    expect($firstClient->getPostalCountry())->toBeNull();
    expect($firstClient->getPhone())->toBe('(02) 1723 5265');
    expect($firstClient->getFax())->toBeNull();
    expect($firstClient->getWebsite())->toBeNull();
    expect($firstClient->getReferralSource())->toBeNull();
    expect($firstClient->getExportCode())->toBeNull();
    expect($firstClient->getIsProspect())->toBe('No');
    expect($firstClient->getIsArchived())->toBe('No');
    expect($firstClient->getIsDeleted())->toBe('No');
    expect($firstClient->getAccountManager())->toBe(RelatedData::from([
        'uuid' => 'dc48df15-1a5c-4675-9d82-4ca54e2c6e86',
        'name' => 'Jo Blogs',
    ]));
    expect($firstClient->getContacts())->toBe(DataCollection::class)->toHaveCount(1);

    $secondClient = $response->getClients()->offsetGet(1);

    expect($secondClient->getUuid())->toBe('9e023415-b173-4375-b8d5-4220b5a6b294');
    expect($secondClient->getName())->toBe('A. Dutchess');
    expect($secondClient->getTitle())->toBeNull();
    expect($secondClient->getGender())->toBeNull();
    expect($secondClient->getFirstName())->toBeNull();
    expect($secondClient->getLastName())->toBeNull();
    expect($secondClient->getOtherName())->toBeNull();
    expect($secondClient->getEmail())->toBe('');
    expect($secondClient->getDateOfBirth())->toBe('');
    expect($secondClient->getAddress())->toBe('');
    expect($secondClient->getCity())->toBe('');
    expect($secondClient->getRegion())->toBe('');
    expect($secondClient->getPostCode())->toBe('');
    expect($secondClient->getCountry())->toBe('');
    expect($secondClient->getPostalAddress())->toBe('P O Box 123');
    expect($secondClient->getPostalCity())->toBe('Wellington');
    expect($secondClient->getPostalRegion())->toBe('');
    expect($secondClient->getPostalPostCode())->toBe('6011');
    expect($secondClient->getPostalCountry())->toBe('');
    expect($secondClient->getPhone())->toBe('');
    expect($secondClient->getFax())->toBe('');
    expect($secondClient->getWebsite())->toBe('');
    expect($secondClient->getReferralSource())->toBe('');
    expect($secondClient->getExportCode())->toBe('');
    expect($secondClient->getIsProspect())->toBe('No');
    expect($secondClient->getIsArchived())->toBe('No');
    expect($secondClient->getIsDeleted())->toBe('No');
    expect($secondClient->getContacts())->toBe(DataCollection::class)->toHaveCount(0);
    expect($secondClient->getBillingClient())->toBe(RelatedData::class);
});
