import { NestFactory } from '@nestjs/core';
import { AppModule } from './app.module';

import { LoggerMiddleware } from './middleeare/logger.middleware';

async function bootstrap() {
  const app = await NestFactory.create(AppModule);
  // 应用中间件
  // app.use(LoggerMiddleware);
  app.setGlobalPrefix('api'); // 设置全局路由前缀
  await app.listen(3000);
}
bootstrap();
