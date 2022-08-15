import { IsInt, Length } from 'class-validator';

export class CreateCatDto {
  @IsInt()
  readonly id: number;

  @Length(1, 20)
  readonly name: string;

  @Length(1, 100)
  readonly breed: string;
}
