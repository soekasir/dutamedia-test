package com.dutamedia.web.modules.auth.dto;

import lombok.Getter;
import lombok.Setter;

public class SignInDto {
  @Getter @Setter
  private String email;
  @Getter @Setter
  private String password;
}
