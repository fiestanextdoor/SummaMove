import 'package:flutter/material.dart';
import '../user_store.dart';

class HomeScreen extends StatefulWidget {
  const HomeScreen({super.key});

  @override
  State<HomeScreen> createState() => _HomeScreenState();
}

class _HomeScreenState extends State<HomeScreen> {
  List<Map<String, String>> exercises = [];
  bool isLoading = true;

  void fetchExercises() {
    // Simuleer wachten
    Future.delayed(const Duration(milliseconds: 500), () {
      setState(() {
        exercises = UserStore.dummyExercises;
        isLoading = false;
      });
    });
  }

  @override
  void initState() {
    super.initState();
    fetchExercises();
  }

  @override
  Widget build(BuildContext context) {
    final isLoggedIn = UserStore.isLoggedIn;

    return Scaffold(
      appBar: AppBar(title: const Text('Oefeningen')),
      drawer: Drawer(
        child: ListView(
          children: [
            const DrawerHeader(
              child: Text('Menu', style: TextStyle(fontSize: 24)),
            ),
            if (!isLoggedIn) ...[
              ListTile(
                title: const Text('Login'),
                onTap: () => Navigator.pushNamed(context, '/login'),
              ),
              ListTile(
                title: const Text('Register'),
                onTap: () => Navigator.pushNamed(context, '/register'),
              ),
            ],
            if (isLoggedIn) ...[
              ListTile(
                title: const Text('Prestaties'),
                onTap: () => Navigator.pushNamed(context, '/performance'),
              ),
              ListTile(
                title: const Text('Over'),
                onTap: () => Navigator.pushNamed(context, '/about'),
              ),
              ListTile(
                title: const Text('QR Scanner'),
                onTap: () => Navigator.pushNamed(context, '/qr_scanner'),
              ),
              ListTile(
                title: const Text('Uitloggen'),
                onTap: () {
                  UserStore.logout();
                  setState(() {});
                  Navigator.pop(context); // sluit de drawer
                },
              ),
            ],
          ],
        ),
      ),
      body: isLoading
          ? const Center(child: CircularProgressIndicator())
          : exercises.isEmpty
          ? const Center(child: Text('Geen oefeningen gevonden.'))
          : ListView.builder(
        itemCount: exercises.length,
        itemBuilder: (context, index) {
          final exercise = exercises[index];
          return ListTile(
            title: Text(exercise['name'] ?? 'Geen naam'),
            subtitle:
            Text(exercise['description'] ?? 'Geen beschrijving'),
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
