import AxiosService from "./AxiosService"

class BackendApi extends AxiosService {
  constructor() {
    super(import.meta.env.VITE_BACKEND_URL)
  }
}

export const backendApi = new BackendApi()
