<!-- resources/views/auth/login.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Login - Dark Theme</title>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

  * {
    margin: 0; padding: 0; box-sizing: border-box;
  }

  body {
    background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
    font-family: 'Poppins', sans-serif;
    height: 100vh;
    display: flex; justify-content: center; align-items: center;
    color: #e5e7eb;
  }

  .login-container {
    background: linear-gradient(145deg, #111827, #374151);
    border-radius: 15px;
    padding: 40px 50px;
    box-shadow: 0 8px 30px rgba(0,0,0,0.6);
    width: 350px;
  }

  .login-container h2 {
    text-align: center;
    margin-bottom: 30px;
    font-weight: 600;
    color: #f9fafb;
    letter-spacing: 1.2px;
  }

  label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    color: #9ca3af;
  }

  input[type="email"],
  input[type="password"] {
    width: 100%;
    padding: 12px 15px;
    margin-bottom: 25px;
    border: none;
    border-radius: 10px;
    background-color: #1f2937;
    color: #f9fafb;
    font-size: 1rem;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
  }

  input[type="email"]:focus,
  input[type="password"]:focus {
    background-color: #374151;
    outline: none;
    box-shadow: 0 0 10px #4f46e5;
  }

  button {
    width: 100%;
    padding: 14px 0;
    border: none;
    border-radius: 10px;
    background: linear-gradient(135deg, #4f46e5, #3b82f6);
    color: white;
    font-weight: 600;
    font-size: 1.1rem;
    cursor: pointer;
    box-shadow: 0 4px 15px rgba(79, 70, 229, 0.6);
    transition: background 0.3s ease;
  }

  button:hover {
    background: linear-gradient(135deg, #3b82f6, #4f46e5);
  }

  .forgot-password {
    text-align: right;
    font-size: 0.85rem;
    color: #818cf8;
    margin-top: -15px;
    margin-bottom: 20px;
    cursor: pointer;
  }

  .forgot-password:hover {
    text-decoration: underline;
  }

  .error-message {
    background-color: #b91c1c;
    color: white;
    padding: 8px 12px;
    border-radius: 8px;
    margin-bottom: 20px;
    font-size: 0.9rem;
  }
</style>
</head>
<body>

  <div class="login-container">
    <h2>Login</h2>

    {{-- Display validation errors --}}
    @if ($errors->any())
      <div class="error-message">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <label for="email">Email ID</label>
      <input 
        type="email" 
        id="email" 
        name="email" 
        placeholder="you@example.com" 
        value="{{ old('email') }}" 
        required 
        autofocus 
      />

      <label for="password">Password</label>
      <input 
        type="password" 
        id="password" 
        name="password" 
        placeholder="Your password" 
        required 
        autocomplete="current-password" 
      />


      <button type="submit">Sign In</button>
    </form>
  </div>

</body>
</html>
