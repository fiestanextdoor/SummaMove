import 'package:flutter/material.dart';
import 'about_screen.dart';
import 'login_screen.dart';
import 'performance_screen.dart';

class HomeScreen extends StatefulWidget {
  @override
  _HomeScreenState createState() => _HomeScreenState();
}

class _HomeScreenState extends State<HomeScreen> {
  final List<String> exercises = [
    'Oefening 1',
    'Oefening 2',
    'Oefening 3',
  ];

  String selectedLanguage = 'Nederlands';

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('SummaMove Oefeningen'),
      ),
      drawer: Drawer(
        child: ListView(
          children: [
            DrawerHeader(
              child: Text('SummaMove Menu', style: TextStyle(fontSize: 24)),
              decoration: BoxDecoration(color: Colors.blue),
            ),
            ListTile(
              title: Text('Taal: $selectedLanguage'),
              onTap: () {
                _showLanguageDialog();
              },
            ),
            ListTile(
              title: Text('Oefeningen'),
              onTap: () {
                Navigator.pop(context);
              },
            ),
            ListTile(
              title: Text('Prestaties'),
              onTap: () {
                Navigator.pushNamed(context, PerformanceScreen.routeName);
              },
            ),
            ListTile(
              title: Text('Inloggen'),
              onTap: () {
                Navigator.pushNamed(context, LoginScreen.routeName);
              },
            ),
            ListTile(
              title: Text('About'),
              onTap: () {
                Navigator.pushNamed(context, AboutScreen.routeName);
              },
            ),
          ],
        ),
      ),
      body: ListView.builder(
        itemCount: exercises.length,
        itemBuilder: (ctx, i) {
          return ListTile(
            title: Text(exercises[i]),
            onTap: () {
              // TODO: oefening detail scherm
            },
          );
        },
      ),
    );
  }

  void _showLanguageDialog() {
    showDialog(
      context: context,
      builder: (ctx) => AlertDialog(
        title: Text('Selecteer taal'),
        content: Column(
          mainAxisSize: MainAxisSize.min,
          children: [
            RadioListTile<String>(
              title: Text('Nederlands'),
              value: 'Nederlands',
              groupValue: selectedLanguage,
              onChanged: (val) {
                setState(() {
                  selectedLanguage = val!;
                });
                Navigator.of(ctx).pop();
              },
            ),
            RadioListTile<String>(
              title: Text('Engels'),
              value: 'Engels',
              groupValue: selectedLanguage,
              onChanged: (val) {
                setState(() {
                  selectedLanguage = val!;
                });
                Navigator.of(ctx).pop();
              },
            ),
          ],
        ),
      ),
    );
  }
}
