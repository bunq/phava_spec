# Phava Specification

You are looking at Phava, the custom-built PHP framework bunq invented to serve you the best banking experience in the world.
The framework is designed to be easy to work with, yet, powerful enough to build an API that enables the bunq app (and [external developers](https://github.com/bunq)) to do its magic. 🌈

*This is a beta (0.9) version of the Phava specification.*

## About Phava 

Phava is a PHP style framework initially developed as a coding practice for building robust, scalable architectures at [bunq](https://bunq.com). It combines the best of PHP and Java: it's easy to use and read, and it's object-oriented. It's the best of both worlds.

Phava makes for less error-prone code that is easy to maintain. It has objects for everything. 

E.g., imagine you have a string "Luxembourg". From just this value, you can't derive whether it's referring to the city or the country. Hence, within Phava, you would wrap this value in a class that tells you exactly what the value relates to. In this case, it could be either a `City` object or a `Country` object with "Luxembourg" as its value. 

**What Phava has from PHP:**

* the foundation;
* setup;
* no compiling;
* works with every deployment system that supports PHP;
* readability.

**What Phava has from Java:**

* focus on objects;
* enforced structure;
* strict typing.

**When should you use Phava?**

Phava makes it possible to create robust, durable architectures that are easy to scale. It's perfect if you want to build an  application that:

* will entail continuous development;
* will be worked on by many developers;
* you will not throw away in a couple of years.

Phava will slow you down in the very beginning, but you’ll have a robust system in just two weeks. 👯

## Phava coding conventions
The good coding practice of Phava is ensured by conforming to the following conventions applied to PHP as the base.

1. **Make sure your code is readable** :x:🔮
All code constructs, such as methods, variables, and classes, must speak of their purpose. It must be in-your-face obvious what they do and what they are there for. Do not use any abbreviations. Choose explicitness over shorter names.

E.g., you could use `LIMIT_QUERY` as a name for a constant the value of which is used to limit the number of results you obtain when executing a database query. However, but `LIMIT_NUMBER_OF_PAYMENTS_SHOWN_AT_ONCE` would make a better name because it communicates the intention of the limit more clearly.

2. **Stick to the naming conventions** 

  All classes must be named Big-to-Small. Larger, encompassing classes come first. Smaller, distinct classes follow.

E.g.,
  ```php
  class MonetaryAccount {};
  class MonetaryAccountBank {};
  class MonetaryAccountSavings {};
  ```

The more specific parts must be placed in the last part of the class name. 

E.g.,`TabItem` and `TabResultInquiry`: classes get more specific towards the end of the name.

3. **Test all branches and throw Exceptions when things are exceptional**
  <!-- Very bad example, I need a better one. S: I can't think of a proper example at this moment,.. maybe later something comes to mind -->
  You must check all your conditional branches.
 
E.g.,
  ```php
  if ($user->getBalance()->isGreaterThan(10)) {
    return 'You can buy something!';
  } else if ($user->getBalance()->isSmallerThan(10)) {
    return 'You should save more!';
  }
  ```

The case where the user balance is exactly 10 is not covered now. This is not what you want. You must cover _all_ cases, even when you do not want to do something intentionally.

Here is an improved version of the function above:

  ```php
  if ($user->getBalance()->isGreaterThan(10)) {
    return 'You can buy something!';
  } else if ($user->getBalance()->isSmallerThan(10)) {
    return 'You should save more!';
  } else {
    // We do not want to show a message when the balance is 10.
  }
  ```

This way, it's clear for others _why_ you do nothing now, and that it _is_ intentional.

4. **Never use public variables in objects**

Use getters and setters to prevent unintentional value changes.

E.g., say a class that describes a bank account has a field to denote the account's balance. If the field is public, _any_ class in the system can overwrite the balance (un)intentionally. 
* By using a getter, you guard access to the balance to only grant it to the classes that need access to it. 
* By using a setter, you block unauthorized alterations of this number. Any change must first pass through the setter function, in which you later perform the necessary checks. 

5. **Never use aliases in any other level than the API**

No calls or messages must use aliases to find object IDs except for the calls of the API.

6. **Keep functions small**

All methods must be simple and to the point. If a method has more than four arguments, it is too complex. Split it up, or pass an object instead.

E.g.,

```php
function sendCard(Street $street, NumberHouse $numberHouse, ZipCode $zipCode, City $city, Country $country) {
    ...
}
```

You should shorten it by wrapping the related function parameters into a single `Address` object as demonstrated below:

```php
function sendCard(Address $address) {
    ...
}
```

7. **Never use references**

Just don't do it. No referencing makes for easy tracking of changes and helps to prevent unwanted value updates.
  
E.g.,

  ```php
  function yoMamma(Model &$model) {
    // Something here.
  }
  ```

8. **Never use (PHP) magic** :x:🧙

The code must always work as the user expects. Nothing more, nothing less. **This is the most important rule of all.**
