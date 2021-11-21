<?php

use EthersPHP\Bytes\Concerns\Hexable;

use function EthersPHP\Bytes\arrayify;
use function EthersPHP\Bytes\isHexString;

class HexableTest implements Hexable
{
    public function toHexString(): string
    {
        return '0x01';
    }
}

test('arrayify Numbers', function () {
    expect(arrayify(1))->toBe([1]);

    expect(arrayify(8))->toBe([8]);

    expect(arrayify(64))->toBe([64]);

    expect(arrayify(255))->toBe([255]);

    expect(arrayify(256))->toBe([1, 0]);

    expect(arrayify(0x1234))->toBe([18, 52]);
});

test('arrayify Hexable', function () {
    expect(arrayify(new HexableTest))->toBe([1]);
});

test('arrayify hex string', function () {
    expect(arrayify('0x1234'))->toBe([18, 52]);
});

test('isHexString', function () {
    expect(isHexString('0x1234'))->toBeTrue();
    expect(isHexString('123'))->toBeFalse();
    expect(isHexString(false))->toBeFalse();
    expect(isHexString(1235))->toBeFalse();
    expect(isHexString(0x1234))->toBeFalse();
});
