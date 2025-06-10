import 'package:flutter/material.dart';

class AboutScreen extends StatelessWidget {
  static const routeName = '/about';

  final String version = '1.0.0';

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('About SummaMove'),
      ),
      body: Padding(
        padding: EdgeInsets.all(16),
        child: Text(
          'SummaMove app\n'
              'Versie: $version\n\n'
              'Deze app helpt je oefeningen te bekijken en prestaties bij te houden.\n\n'
              'Voor hulp bezoek: https://www.summamove.help',
          style: TextStyle(fontSize: 18),
        ),
      ),
    );
  }
}
