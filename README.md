# Payment Stuff - Thiago Mota 📜

Welcome to **Readme of simplified Payment System**!

## About the Project ☕️

- List all Payments;
- See a payment details;
- Create new Payment;

## About the Stacks 📜

- For this project, i decided to use Laravel v9.52, and PHP v8.0.11 for **BACK-END**;
- For **DATABASE**, MySQL (MariaDB);

## Technical info 📜
In this project, you will see:

- Samples of usage of Strategy Pattern;
- Services classes to handle controllers;
- Samples of Dependency Injection;
- Clean Code;
- DRY;
- SOLID;

## API ROUTES 📜

- **GET**: ..api/payments (List All payments);
- **GET**: ..api/payments/{id} (A payment details);
- **POST**: ..api/payment (Create a Payment); -> Data: {
  "payment_method": 2,
	"client_name": "Thiago Mota",
	"cpf": "54924375004",
	"description": "Something goes here",
	"amount": 600,
	"status": 1
}
- **POST**: ..api/payment/process (Process a Payment) -> Data: {
	"payment_id": 1
};

## Some prints ☕️

- Example of API end-points
<img src="https://github.com/ThiagoMotaIta/payment-stuff/blob/main/public/img/api-routes.png" width="100%" />

- PHPUnit test running
<img src="https://github.com/ThiagoMotaIta/payment-stuff/blob/main/public/img/unit-tests.png" width="100%" />

- Tables Relationship
<img src="https://github.com/ThiagoMotaIta/payment-stuff/blob/main/public/img/tables-rel.png" width="100%" />


## Testing 📜

- 100% test coverage :D

