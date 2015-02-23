# Komparu Value
Convert string value to a convenient value object.

### Values with operators

```php
ValueFactory::fromString('10'); // returns a Operator object with operator '='
ValueFactory::fromString('<10'); // returns a Operator object with operator '<'
ValueFactory::fromString('<=10'); // returns a Operator object with operator '<='
ValueFactory::fromString('10~20'); // returns a Range object with min=10 and max=20
ValueFactory::fromString('~test~'); // returns a Partial object (left=true, right=true)
ValueFactory::fromString('~test'); // returns a Partial object (left=true, right=false)
ValueFactory::fromString('test~'); // returns a Partial object (left=false, right=false)
```

### Typecasting
```php
ValueFactory::typecast('20'); // returns (int) 20
ValueFactory::typecast('20.4'); // returns (float) 20.4
ValueFactory::typecast('false'); // returns (bool) false
ValueFactory::typecast('true'); // returns (bool) true
```

### Typecasting with hint
```php
ValueFactory::typecast('20', 'string'); // returns (string) '20'
ValueFactory::typecast('20', 'int'); // returns (int) 20
ValueFactory::typecast('true', 'int'); // returns (int) 1
ValueFactory::typecast('20', 'bool'); // returns (bool) true
```
