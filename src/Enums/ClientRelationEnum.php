<?php

namespace BuckhamDuffy\LaravelXeroPracticeManager\Enums;

enum ClientRelationEnum: string
{
	case DIRECTOR = 'Director';
	case SHAREHOLDER = 'Shareholder';
	case TRUSTEE = 'Trustee';
	case BENEFICIARY = 'Beneficiary';
	case PARTNER = 'Partner';
	case SETTLOR = 'Settlor';
	case ASSOCIATE = 'Associate';
	case SECRETARY = 'Secretary';
	case PUBLIC_OFFICER = 'Public Officer';
	case HUSBAND = 'Husband';
	case WIFE = 'Wife';
	case SPOUSE = 'Spouse';
	case PARENT_OF = 'Parent Of';
	case CHILD_OF = 'Child Of';
	case APPOINTER = 'Appointer';
	case MEMBER = 'Member';
	case AUDITOR = 'Auditor';
	case OWNER = 'Owner';
}
