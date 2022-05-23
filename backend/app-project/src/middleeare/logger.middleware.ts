import { Injectable, NestMiddleware } from '@nestjs/common';

@Injectable()
export class LoggerMiddleware implements NestMiddleware {
  // req: 即 Request，请求信息
  // req: 即 Response，响应信息
  // next：将控制传递到下一个中间件
  use(req: any, res: any, next: () => void) {
    next();
  }
}
