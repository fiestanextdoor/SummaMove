import 'package:flutter/material.dart';
import 'screens/login_screen.dart';
import 'screens/register_screen.dart';
import 'screens/home_screen.dart';
import 'screens/performance_screen.dart';
import 'screens/about_screen.dart';
import 'screens/excercise_detail.dart';
import 'screens/qr_scanner_screen.dart';

void main() {
  runApp(SummaMoveApp());
}

class SummaMoveApp extends StatelessWidget {
  const SummaMoveApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'SummaMove',
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
      initialRoute: '/',
      routes: {
        '/': (context) => HomeScreen(),
        '/login': (context) => LoginScreen(),
        '/register': (context) => RegisterScreen(),
        '/home': (context) => HomeScreen(),
        '/performance': (context) => PerformanceScreen(),
        '/about': (context) => AboutScreen(),
        '/exercise_detail': (context) => ExerciseDetailScreen(),
        '/qr_scanner': (context) => QRScannerScreen(),
      },
    );
  }
}