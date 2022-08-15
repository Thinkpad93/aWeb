import {
  Body,
  Controller,
  Delete,
  Get,
  Header,
  HttpCode,
  Param,
  Post,
  Put,
  Query,
  Redirect,
  Req,
} from '@nestjs/common';
import { Request } from 'express';
import { CatsService } from './cats.service';
import { CreateCatDto } from './dto/create-cat.dto';
import { Cat } from './interfaces/cat.interface';
import { Roles } from './roles.decorator';

@Controller('cats')
export class CatsController {
  constructor(private catsService: CatsService) {

  }

  // /cats
  @Post()
  create(@Body() createCatDto: CreateCatDto) {
    this.catsService.create(createCatDto);
  }

  @Delete(':id')
  remove(@Param('id') id) {
    return `This action removes a #${id} cat`;
  }

  @Put(':id')
  update(@Param('id') id) {
    return `This action updates a #${id} cat`;
  }

  // cats/list
  @Get('list')
  async findAll(): Promise<Cat[]> {
    return this.catsService.findAll();
  }

  // cats/docs?version=5
  @Get('docs')
  @Redirect('https://docs.nestjs.com', 302)
  getDocs(@Query('version') version) {
    if (version && version === '5') {
      return {
        url: 'https://docs.nestjs.com/v5/',
      };
    }
  }


  // cats/1  cats/2
  @Get(':id')
  findOne(@Param() params) {
    // console.log(params.id);
    return this.catsService.findOne(params.id);
    // return `This action returns a #${params.id} cats`;
  }
}
