import InputField from "./InputField";
import SocialLogin from "./SocialLogin";
import { Link } from "react-router-dom";

const Login = () => {
  return (
    <div className="login-container">
      <h2 className="form-title">Log in with</h2>
      <SocialLogin />

      <p className="separator">
        <span>or</span>
      </p>

      <form
        action="http://localhost:8080/FormServer/process_login.php"
        className="login-form"
        method="POST"
      >
        <InputField
          type="email"
          name="email"
          placeholder="Email Address"
          icon="mail"
        />
        <InputField
          type="password"
          name="password"
          placeholder="Password"
          icon="lock"
        />

        <a href="#" className="forgot-pass-link">
          Forgot Password?
        </a>

        <button type="submit" className="login-button">
          Log In
        </button>
      </form>
      <p className="signup-text">
        Don't have an account? <Link to="/signup">SignUp Now</Link>
      </p>
    </div>
  );
};

export default Login;
