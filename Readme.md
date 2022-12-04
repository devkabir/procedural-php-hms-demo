# Hospital Management System - HMS

A simple example of a management system created using PHP and the [`MVC`](https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller) design pattern :tada:

## Structure :coffee:
```bash
├───controller    # Accepts input and converts it to commands for the model or view.
│   ├───admin
│   ├───doctor
│   ├───patient
│   └───website
├───model         # Typically represents a table in the application's database.
│   ├───admin
│   ├───doctor
│   ├───patient
│   └───website
└───view          # Any representation of information such as a table. 
    ├───admin
    ├───doctor
    ├───patient
    └───website

```