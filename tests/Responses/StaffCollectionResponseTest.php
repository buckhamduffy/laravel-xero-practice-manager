<?php
use BuckhamDuffy\LaravelXeroPracticeManager\Responses\StaffCollectionResponse;

it('can deserialize StaffCollection with multiple Staff', function(){
    $xml = <<<XML
        <Response>
          <Status>OK</Status>
          <StaffList>
            <Staff>
              <UUID>f8235e1a-d383-48b7-9139-ba97ab8ca889</UUID>
              <Name>Jo Bloggs</Name>
              <Email>jo@bloggs.net</Email>
              <Phone />
              <Mobile />
              <Address />
              <PayrollCode />
            </Staff>
            <Staff>
              <UUID>0cbaf41f-9241-4f72-8b90-fbdf4457c346</UUID>
              <Name>John Smith</Name>
              <Email>john@smith.com</Email>
              <Phone />
              <Mobile />
              <Address />
              <PayrollCode />
            </Staff>
          </StaffList>
        </Response>
    XML;

    $response = StaffCollectionResponse::from(trim($xml));

    expect($response->getStatus())->toBe('OK');
    expect($response->getStaff())->toHaveCount(2);

    expect($response->getStaff()->offsetGet(0)->getUUID())->toBe('f8235e1a-d383-48b7-9139-ba97ab8ca889');
    expect($response->getStaff()->offsetGet(0)->getName())->toBe('Jo Bloggs');
    expect($response->getStaff()->offsetGet(0)->getEmail())->toBe('jo@bloggs.net');
    expect($response->getStaff()->offsetGet(0)->getPhone())->toBeNull();
    expect($response->getStaff()->offsetGet(0)->getMobile())->toBeNull();
    expect($response->getStaff()->offsetGet(0)->getAddress())->toBeNull();
    expect($response->getStaff()->offsetGet(0)->getPayrollCode())->toBeNull();

    expect($response->getStaff()->offsetGet(1)->getUUID())->toBe('0cbaf41f-9241-4f72-8b90-fbdf4457c346');
    expect($response->getStaff()->offsetGet(1)->getName())->toBe('John Smith');
    expect($response->getStaff()->offsetGet(1)->getEmail())->toBe('john@smith.com');
    expect($response->getStaff()->offsetGet(1)->getPhone())->toBeNull();
    expect($response->getStaff()->offsetGet(1)->getMobile())->toBeNull();
    expect($response->getStaff()->offsetGet(1)->getAddress())->toBeNull();
    expect($response->getStaff()->offsetGet(1)->getPayrollCode())->toBeNull();
});

it('can deserialize StaffCollection with single Staff', function(){
    $xml = <<<XML
        <Response>
          <Status>OK</Status>
          <StaffList>
            <Staff>
              <UUID>f8235e1a-d383-48b7-9139-ba97ab8ca889</UUID>
              <Name>Jo Bloggs</Name>
              <Email>jo@bloggs.net</Email>
              <Phone />
              <Mobile />
              <Address />
              <PayrollCode />
            </Staff>
          </StaffList>
        </Response>
    XML;

    $response = StaffCollectionResponse::from(trim($xml));

    expect($response->getStatus())->toBe('OK');
    expect($response->getStaff())->toHaveCount(1);

    expect($response->getStaff()->offsetGet(0)->getUUID())->toBe('f8235e1a-d383-48b7-9139-ba97ab8ca889');
    expect($response->getStaff()->offsetGet(0)->getName())->toBe('Jo Bloggs');
    expect($response->getStaff()->offsetGet(0)->getEmail())->toBe('jo@bloggs.net');
    expect($response->getStaff()->offsetGet(0)->getPhone())->toBeNull();
    expect($response->getStaff()->offsetGet(0)->getMobile())->toBeNull();
    expect($response->getStaff()->offsetGet(0)->getAddress())->toBeNull();
    expect($response->getStaff()->offsetGet(0)->getPayrollCode())->toBeNull();
});
