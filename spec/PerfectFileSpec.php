<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use PerfectFile;

class PerfectFileSpec extends ObjectBehavior
{
    const PERFECT_FILE = "Perfect File";
    const NOT_PERFECT_FILE = "Not Perfect File";
    public function it_Empty_File()
    {
        $this->is_Perfect_File("Testing_File\\Empty_File.txt")->shouldBe(self::NOT_PERFECT_FILE);
    }
    public function it_contain_Invalid_Format()
    {
        $this->is_Perfect_File("Testing_File\\Contain_Chars.txt")->shouldBe(self::NOT_PERFECT_FILE);
    }
    public function it_return_Not_Perfect()
    {
        $this->is_Perfect_File("Testing_File\\Not_Perfect_File.txt")->shouldBe(self::NOT_PERFECT_FILE);
    }

    public function it_contain_empty_row()
    {
        $this->is_Perfect_File("Testing_File\\Empty_Row.txt")->shouldBe(self::NOT_PERFECT_FILE);
    }
    public function it_contain_2_space()
    {
        $this->is_Perfect_File("Testing_File\\Contain_2_Spaces.txt")->shouldBe(self::NOT_PERFECT_FILE);
    }
    public function it_should_return_perfect_file()
    {
        $this->is_Perfect_File("Testing_File\\PerfectFile.txt")->shouldBe(self::PERFECT_FILE);
    }
}
