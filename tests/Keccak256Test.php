<?php

use EthersPHP\Keccak256\Keccak256;

use function EthersPHP\Keccak256\keccak256;

test('example 1', function () {
    expect(Keccak256::hash('0x'))->toBe("0xc5d2460186f7233c927e7db2dcc703c0e500b653ca82273b7bfad8045d85a470");
});

test('example 2', function () {
    expect(Keccak256::hash([]))->toBe("0xc5d2460186f7233c927e7db2dcc703c0e500b653ca82273b7bfad8045d85a470");
});

test('example 3', function () {
    expect(Keccak256::hash([0x12, 0x34]))->toBe("0x56570de287d73cd1cb6092bb8fdee6173974955fdef345ae579ee9f475ea7432");
});

test('example 4', function () {
    expect(Keccak256::hash('0x1234'))->toBe("0x56570de287d73cd1cb6092bb8fdee6173974955fdef345ae579ee9f475ea7432");
});

test('example 5', function () {
    expect(fn () => Keccak256::hash('Hello World'))->toThrow(Exception::class, "invalid arrayify value");
});

test('example 6', function () {
    expect(fn () => Keccak256::hash(['Hello World']))->toThrow(Exception::class, "invalid arrayify value");
});

test('example 7', function () {
    expect(fn () => keccak256("123"))->toThrow(Exception::class, "hex data is odd-length");
});
