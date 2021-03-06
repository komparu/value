<?php
/**
 * User: Roeland Werring
 * Date: 29/04/16
 * Time: 11:02
 *
 */

namespace Komparu\Value;

class Type
{
    const DATATYPE = 'DataType';
    const STRING = 'String';
    const SHORTSTRING = 'Shortstring';
    const TEXT = 'Text';
    const NUMBER = 'Number';
    const BOOLEAN = 'Boolean';
    const INTEGER = 'Integer';
    const DECIMAL = 'Decimal';
    const FLOAT = 'Float';
    const ARR = 'Array';
    const OBJECT = 'Object';
    const DATESTRING = 'DateString';
    const BLOB = 'Blob';

    const DATE = 'Date'; //yyyy-mm-dd
    const DATETIME = 'DateTime'; //yyyy-mm-dd HH:ii:ss
    const POSTALCODE = 'Postalcode'; //9999AA
    const POSTALCODECH = 'Postalcodech'; //9999AA
    const INITIALS = 'Initials';
    const KVKNUMBER = 'KvkNumber';
    const IBAN = 'Iban';
    const BSN = 'Bsn';
    const PHONENUMBER = 'Phonenumber';
    const PHONENUMBERINT = 'Phonenumberint';
    const EMAIL = 'Email';
    const CARREPORTINGCODE = 'CarReportingCode';
    const SMSTOKENREQUESTER = 'SmsTokenRequester';

    const  REFERENCE = 'Reference';
    const  HIDDEN = 'Hidden';

    // Extend the Thing schema with some properties.
    // Each property can now be of a certain schema type
    const  THING = 'Thing';

    // Extend the basic types
    const  HEADING = 'Heading';
    const  SUBHEADING = 'SubHeading';
    const  URL = 'Url';
    const  DESCRIPTION = 'Description';
    const  FILE = 'File';
    const  IMAGE = 'Image';
    const  CAROUSEL = 'Carousel';
    const  COLOR = 'Color';
    const  FONT = 'Font';
    const  PRICE = 'Price';
    const  PRICECENT = 'Pricecent';
    const  PRICELARGE = 'Pricelarge';
    const  POINTS = 'Points';
    const  LST = 'List';
    const  TRANSLATION = 'Translation';
    const  ICON = 'Icon';
    const  ICONSEQUENCE = 'IconSequence';
    const  RATING = 'Rating';
    const  UNLIMITED = 'Unlimited';

    //
    const  CHOICE = 'Choice';
    const  SCHEMA = 'Schema';




    // Give context to a data types
    const  PERCENTAGE = 'Percentage';
    const  AGREED = 'Agreed'; // Yes or No
    const  ACTIVATED = 'Activated'; // On or Off

    //only used for translations
    const  TRANSSTRING = 'TransString';
    const  TRANSLATABLE = 'Translatable';
    const  LICENSEPLATE = 'Licenseplate';
    const  SECURITY = 'Security';
    //base64 image

    const  BASE64 = 'base64';

}
