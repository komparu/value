# Komparu Value
Convert string value to a convenient value object.

### Typecasting
```php
ValueFactory::typecast('20'); // returns (int) 20
ValueFactory::typecast('20.4'); // returns (float) 20.4
ValueFactory::typecast('false'); // returns (bool) false
ValueFactory::typecast('true'); // returns (bool) true
ValueFactory::typecast('∞'); // returns (int) 99999999 // Used internally for infinity
ValueFactory::typecast('-∞'); // returns (int) -99999999 // Used internally for negative infinity
```

### Typecasting with hint
```php
ValueFactory::typecast('20', 'string'); // returns (string) '20'
ValueFactory::typecast('20', 'int'); // returns (int) 20
ValueFactory::typecast('true', 'int'); // returns (int) 1
ValueFactory::typecast('20', 'bool'); // returns (bool) true
```
