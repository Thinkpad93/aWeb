import { Module } from '@nestjs/common';
import { CatsController } from './cats.controller';
import { CatsService } from './cats.service';

@Module({
  controllers: [CatsController],
  providers: [CatsService],
  exports: [CatsService] // 该模块要想在其它几个模块之间共享，需求放到 exports 数组中
})
export class CatsModule {}
