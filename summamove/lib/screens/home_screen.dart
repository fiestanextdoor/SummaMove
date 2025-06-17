import 'package:flutter/material.dart';

class HomeScreen extends StatelessWidget {
  final bool isLoggedIn = false;

  final List<Map<String, String>> exercises = [
    {'name': 'Traplopen', 'description': 'Loop de trap op en neer 5 keer.'},
    {'name': 'Push-ups', 'description': 'Doe 10 push-ups.'},
  ];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text('Oefeningen')),
      body: ListView.builder(
        itemCount: exercises.length,
        itemBuilder: (context, index) {
          return ListTile(
            title: Text(exercises[index]['name']!),
            subtitle: Text(exercises[index]['description']!),
            onTap: () => Navigator.pushNamed(context, '/exercise_detail'),
          );
        },
      ),
      drawer: Drawer(
        child: ListView(
          children: [
            DrawerHeader(child: Text('Menu')),

            if (!isLoggedIn) ...[
              ListTile(
                title: Text('Login'),
                onTap: () => Navigator.pushNamed(context, '/login'),
              ),
              ListTile(
                title: Text('Register'),
                onTap: () => Navigator.pushNamed(context, '/register'),
              ),
            ],

            if (isLoggedIn) ...[
              ListTile(
                title: Text('Prestaties'),
                onTap: () => Navigator.pushNamed(context, '/performance'),
              ),
              ListTile(
                title: Text('Over'),
                onTap: () => Navigator.pushNamed(context, '/about'),
              ),
              ListTile(
                title: Text('QR Scanner'),
                onTap: () => Navigator.pushNamed(context, '/qr_scanner'),
              ),
            ],
          ],
        ),
      ),
    );
  }
}
