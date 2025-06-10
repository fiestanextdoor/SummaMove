import 'package:flutter/material.dart';
import 'screens/about_screen.dart';
import 'screens/login_screen.dart';
import 'screens/performance_screen.dart';
import 'screens/home_screen.dart';

void main() {
  runApp(SummaMoveApp());
}

class SummaMoveApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'SummaMove',
      theme: ThemeData(primarySwatch: Colors.blue),
      home: HomeScreen(),
      routes: {
        AboutScreen.routeName: (_) => AboutScreen(),
        LoginScreen.routeName: (_) => LoginScreen(),
        PerformanceScreen.routeName: (_) => PerformanceScreen(),
      },
    );
  }
}