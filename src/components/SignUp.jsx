import React from "react";
import InputField from "./InputField";
import SocialLogin from "./SocialLogin";
import { Link } from "react-router-dom";

const SignUp = () => {
  return (
    <div className="login-container">
      <h2 className="form-title">Sign Up</h2>
      <SocialLogin />

      <p className="separator">
        <span>or</span>
      </p>

      <form
        action="http://localhost:8080/FormServer/process_signup.php"
        className="login-form"
        method="POST"
      >
        <InputField
          type="text"
          name="name"
          placeholder="Enter Name"
          icon="person"
        />

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
        {/* <InputField
          type="password"
          placeholder=" Confirm Password"
          icon="lock"
        /> */}

        {/* <a href="#" className="forgot-pass-link">
          Forgot Password?
        </a> */}

        <button type="submit" className="login-button">
          Sign Up
        </button>
      </form>
      <p className="signup-text">
        Already have an account? <Link to="/">Log In </Link>
      </p>
    </div>
  );
};

export default SignUp;
