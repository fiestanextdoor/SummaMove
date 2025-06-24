class UserStore {
  static final List<Map<String, String>> _users = [];
  static String? _loggedInUser;

  static bool addUser(String username, String password) {
    if (_users.any((u) => u['username'] == username)) return false;
    _users.add({'username': username, 'password': password});
    return true;
  }

  static bool validateUser(String username, String password) {
    final user = _users.firstWhere(
          (u) => u['username'] == username && u['password'] == password,
      orElse: () => {},
    );
    if (user.isNotEmpty) {
      _loggedInUser = username;
      return true;
    }
    return false;
  }

  static void logout() => _loggedInUser = null;

  static bool get isLoggedIn => _loggedInUser != null;

  static String? get currentUser => _loggedInUser;

  static List<Map<String, String>> get dummyExercises => [
    {
      'name': 'Push-ups',
      'description': 'Een oefening voor borst en triceps',
    },
    {
      'name': 'Squats',
      'description': 'Oefening voor benen en billen',
    },
    {
      'name': 'Plank',
      'description': 'Core-stabiliteit verbeteren',
    },
  ];
}
