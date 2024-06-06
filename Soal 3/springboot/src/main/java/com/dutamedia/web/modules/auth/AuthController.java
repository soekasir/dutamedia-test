package com.dutamedia.web.modules.auth;

import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.dutamedia.web.modules.auth.dto.SignInDto;
import com.dutamedia.web.modules.auth.dto.SignUpDto;

import org.springframework.beans.factory.annotation.Autowired;


@RestController
@RequestMapping("api/auth")
public class AuthController {
  @Autowired
  AuthService authService;  

  @PostMapping("signup")
  public Object signUp(@RequestBody SignUpDto dto) {
    return authService.signUp(dto);
  }

  @PostMapping("signin")
  public Object signIn(@RequestBody SignInDto dto) {
    return authService.signIn(dto);
  }
}
