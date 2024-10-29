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
    expect($firstClient->getTitle())->toBeEmpty();
    expect($firstClient->getGender())->toBeEmpty();
    expect($firstClient->getFirstName())->toBeEmpty();
    expect($firstClient->getLastName())->toBeEmpty();
    expect($firstClient->getOtherName())->toBeEmpty();
    expect($firstClient->getEmail())->toBe('someone@example.com');
    expect($firstClient->getDateOfBirth())->toBe('1970-11-26T00:00:00');
    expect($firstClient->getAddress())->toBe('');
    expect($firstClient->getCity())->toBeEmpty();
    expect($firstClient->getRegion())->toBeEmpty();
    expect($firstClient->getPostCode())->toBeEmpty();
    expect($firstClient->getCountry())->toBeEmpty();
    expect($firstClient->getPostalAddress())->toBe("Level 32, PWC Building
         188 Quay Street
         Auckland Central");
    expect($firstClient->getPostalCity())->toBe('Auckland');
    expect($firstClient->getPostalRegion())->toBeEmpty();
    expect($firstClient->getPostalPostCode())->toBe('1001');
    expect($firstClient->getPostalCountry())->toBeEmpty();
    expect($firstClient->getPhone())->toBe('(02) 1723 5265');
    expect($firstClient->getFax())->toBeEmpty();
    expect($firstClient->getWebsite())->toBeEmpty();
    expect($firstClient->getReferralSource())->toBeEmpty();
    expect($firstClient->getExportCode())->toBeEmpty();
    expect($firstClient->getIsProspect())->toBe('No');
    expect($firstClient->getIsArchived())->toBe('No');
    expect($firstClient->getIsDeleted())->toBe('No');
    expect($firstClient->getAccountManager()->getUUID())->toBe('dc48df15-1a5c-4675-9d82-4ca54e2c6e86');
    expect($firstClient->getAccountManager()->getName())->toBe('Jo Blogs');
    expect($firstClient->getContacts())->toHaveCount(1);

    $secondClient = $response->getClients()->offsetGet(1);

    expect($secondClient->getUuid())->toBe('9e023415-b173-4375-b8d5-4220b5a6b294');
    expect($secondClient->getName())->toBe('A. Dutchess');
    expect($secondClient->getTitle())->toBeEmpty();
    expect($secondClient->getGender())->toBeEmpty();
    expect($secondClient->getFirstName())->toBeEmpty();
    expect($secondClient->getLastName())->toBeEmpty();
    expect($secondClient->getOtherName())->toBeEmpty();
    expect($secondClient->getEmail())->toBeEmpty();
    expect($secondClient->getDateOfBirth())->toBeEmpty();
    expect($secondClient->getAddress())->toBeEmpty();
    expect($secondClient->getCity())->toBeEmpty();
    expect($secondClient->getRegion())->toBeEmpty();
    expect($secondClient->getPostCode())->toBeEmpty();
    expect($secondClient->getCountry())->toBeEmpty();
    expect($secondClient->getPostalAddress())->toBe('P O Box 123');
    expect($secondClient->getPostalCity())->toBe('Wellington');
    expect($secondClient->getPostalRegion())->toBeEmpty();
    expect($secondClient->getPostalPostCode())->toBe('6011');
    expect($secondClient->getPostalCountry())->toBeEmpty();
    expect($secondClient->getPhone())->toBeEmpty();
    expect($secondClient->getFax())->toBeEmpty();
    expect($secondClient->getWebsite())->toBeEmpty();
    expect($secondClient->getReferralSource())->toBeEmpty();
    expect($secondClient->getExportCode())->toBeEmpty();
    expect($secondClient->getIsProspect())->toBeEmpty();
    expect($secondClient->getIsArchived())->toBeEmpty();
    expect($secondClient->getIsDeleted())->toBeEmpty();
    expect($secondClient->getContacts())->toBeEmpty();
});
