import { Module } from '@nestjs/common';
import { AppController } from './app.controller';
import { AppService } from './app.service';
import { CatsModule } from './cats/cats.module';
// import { CatsController } from './cats/cats.controller';
// import { CatsService } from './cats/cats.service';
import { PostsModule } from './posts/posts.module';

@Module({
  imports: [CatsModule, PostsModule],
  controllers: [AppController],
  providers: [AppService],
})
export class AppModule {}
