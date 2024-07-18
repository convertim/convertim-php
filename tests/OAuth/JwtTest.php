<?php

namespace OAuth;

use Lcobucci\JWT\Encoding\JoseEncoder;
use Lcobucci\JWT\Token\Parser;
use Lcobucci\JWT\Signer\Key\InMemory;
use Lcobucci\JWT\Signer\Rsa\Sha256;
use Lcobucci\JWT\Validation\Constraint\SignedWith;
use Lcobucci\JWT\Validation\Validator;
use PHPUnit\Framework\TestCase;

class JwtTest extends TestCase
{
    public function testSendPostRequestReturnsConvertimAnalyticsResponse()
    {
        $parser = new Parser(new JoseEncoder());
        $validator = new Validator();

        $stringToken = 'eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJkYXRhIjp7InR5cGUiOiJlc2hvcCIsImVzaG9wSWQiOiIxMTExLTExMTEtMTExMS0xMTExIiwic2VjcmV0VG9rZW5DaGFpbiI6IkJTYmI4QklZeTZMVHNqOXRZMHBZYzdGTnlsWjJNZnNqekxmd0thU3h0V0E2blR1VVVmcG9UUVJWRDlnZ1pNeWEifSwiaWF0IjoxNjg5NzEzMjQ2LCJleHAiOjE2ODk3MTM4NDZ9.dJf2AZW59bSseeAe4ohrr_MlDRbgVsJHeAOk4xb_MFaGEfGFANzzWR8VV5h_2MWr1LPMSDizajAYzikOS2AGOlAnjEtnUFokYII1dl-3WVbNKaoAJhHH83UXHA9-ot6fnzwTni8vVp4vaegUFPofIehtnowfaLrprajlm7OniOsKMFg4DZi6ZLTnfBqm79O5n9VxJ3XwnMI3hOyjIQIrNZwxggNMTjVjj3W5E7wFLfcEjpV4cBGyNXqivYWj0e7-sDtH4mrVerpp6uZHk5RUeBZmvDb2rbWe6KMzULASNa-81UpdkUn2tII5PxN2wBI8A9ZAAPQwpQw_UkEv-rvn4w';
        $token = $parser->parse($stringToken);

        $this->assertTrue($validator->validate($token, new SignedWith(new Sha256(), InMemory::file(__DIR__ . '/../../assets/convertim_oauth.pub'))));
    }
}
