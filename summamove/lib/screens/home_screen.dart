import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

class HomeScreen extends StatefulWidget {
  @override
  _HomeScreenState createState() => _HomeScreenState();
}

class _HomeScreenState extends State<HomeScreen> {
  List<dynamic> exercises = [];
  bool isLoading = true;
  bool isLoggedIn = false;

  Future<void> fetchExercises() async {
    final response = await http.get(Uri.parse('http://jouwdomein.nl/get_exercises.php'));

    if (response.statusCode == 200) {
      setState(() {
        exercises = json.decode(response.body);
        isLoading = false;
      });
    } else {
      setState(() {
        exercises = [];
        isLoading = false;
      });
      ScaffoldMessenger.of(context).showSnackBar(
        SnackBar(content: Text('Fout bij het laden van oefeningen')),
      );
    }
  }

  @override
  void initState() {
    super.initState();
    fetchExercises();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Oefeningen'),
      ),
      drawer: Drawer(
        child: ListView(
          children: [
            DrawerHeader(child: Text('Menu', style: TextStyle(fontSize: 24))),
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
      body: isLoading
          ? Center(child: CircularProgressIndicator())
          : exercises.isEmpty
          ? Center(child: Text('Geen oefeningen gevonden.'))
          : ListView.builder(
        itemCount: exercises.length,
        itemBuilder: (context, index) {
          final exercise = exercises[index];
          return ListTile(
            title: Text(exercise['name'] ?? 'Geen naam'),
            subtitle: Text(exercise['description'] ?? 'Geen beschrijving'),
            onTap: () => Navigator.pushNamed(
              context,
              '/exercise_detail',
              arguments: exercise,
            ),
          );
        },
      ),
    );
  }
}
