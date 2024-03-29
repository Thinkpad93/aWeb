declare namespace Ajax {
  export interface AxiosResponse {
    data: AjaxResponse;
  }
}

export interface AjaxResponse {
  code: number;

  data: object | null | Array<any>;

  message: string;
}
