import { Injectable } from '@nestjs/common';
import { Cat } from './interfaces/cat.interface';

@Injectable()
export class CatsService {
  private readonly cats: Cat[] = [];
  constructor() {}
  create(cat: Cat) {
    this.cats.push(cat);
  }

  findOne(id: number) {
    
  }

  findAll(): Cat[] {
    return this.cats;
  }
}
