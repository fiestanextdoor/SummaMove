import 'package:flutter/material.dart';

class LoginScreen extends StatefulWidget {
  static const routeName = '/login';

  @override
  _LoginScreenState createState() => _LoginScreenState();
}

class _LoginScreenState extends State<LoginScreen> {
  final _formKey = GlobalKey<FormState>();
  String username = '';
  String password = '';

  void _submit() {
    if (_formKey.currentState!.validate()) {
      _formKey.currentState!.save();

      // Proof of concept: gewoon inloggen zonder backend
      ScaffoldMessenger.of(context).showSnackBar(
        SnackBar(content: Text('Inloggen gelukt als $username')),
      );

      Navigator.of(context).pop();
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(
          title: Text('Inloggen'),
        ),
        body: Padding(
          padding: EdgeInsets.all(16),
          child: Form(
            key: _formKey,
            child: Column(children: [
              TextFormField(
                decoration: InputDecoration(labelText: 'Gebruikersnaam'),
                validator: (value) {
                  if (value == null || value.isEmpty) {
                    return 'Vul gebruikersnaam in';
                  }
                  return null;
                },
                onSaved: (value) => username = value!,
              ),
              TextFormField(
                decoration: InputDecoration(labelText: 'Wachtwoord'),
                obscureText: true,
                validator: (value) {
                  if (value == null || value.isEmpty) {
                    return 'Vul wachtwoord in';
                  }
                  return null;
                },
                onSaved: (value) => password = value!,
              ),
              SizedBox(height: 20),
              ElevatedButton(onPressed: _submit, child: Text('Inloggen')),
            ]),
          ),
        ));
  }
}
